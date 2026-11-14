const fs = require('fs');
const path = require('path');
const https = require('https');

const domDir = path.join(__dirname, '.audit', 'reference_dom');
const outDir = path.join(__dirname, '.audit', 'reference_assets');
if (!fs.existsSync(outDir)) {
  fs.mkdirSync(outDir, { recursive: true });
}

// Collect all HTML files
const htmlFiles = ['ref_rendered_dom.html'];
if (fs.existsSync(domDir)) {
  fs.readdirSync(domDir).forEach(f => {
    if (f.endsWith('.html')) htmlFiles.push(path.join(domDir, f));
  });
}

const allImageUrls = new Set();
// Add logo explicitly
allImageUrls.add('https://media.base44.com/images/public/6af3bd9c1141871615af4ece/9c6ad8d0b_logo.png/v1/fit/w_180,h_180/9c6ad8d0b_logo.png');

htmlFiles.forEach(file => {
  if (fs.existsSync(file)) {
    const content = fs.readFileSync(file, 'utf8');
    const matches = [...content.matchAll(/https:\/\/media\.base44\.com\/images\/public\/[^\s"'>\)]+/gi)];
    matches.forEach(m => allImageUrls.add(m[0]));
  }
});

console.log(`Found ${allImageUrls.size} unique image URLs.`);

const download = (url, dest) => {
  return new Promise((resolve, reject) => {
    const file = fs.createWriteStream(dest);
    https.get(url, (res) => {
      if (res.statusCode !== 200) {
        return reject(new Error(`Failed with status ${res.statusCode}`));
      }
      res.pipe(file);
      file.on('finish', () => file.close(resolve));
    }).on('error', (err) => {
      fs.unlink(dest, () => {});
      reject(err);
    });
  });
};

async function run() {
  let idx = 1;
  const manifest = [];
  for (const url of allImageUrls) {
    // Generate clean filename
    const cleanName = url.split('/').filter(p => p.includes('.png') || p.includes('.jpg') || p.includes('.webp'))[0] || `asset_${idx}.png`;
    const dest = path.join(outDir, cleanName);
    console.log(`[${idx}/${allImageUrls.size}] Downloading: ${cleanName}...`);
    try {
      await download(url, dest);
      const stats = fs.statSync(dest);
      manifest.push({ originalUrl: url, filename: cleanName, size: stats.size });
      console.log(`  -> Saved ${stats.size} bytes`);
    } catch (e) {
      console.error(`  -> Failed: ${e.message}`);
    }
    idx++;
  }
  fs.writeFileSync(path.join(__dirname, '.audit', 'images_manifest.json'), JSON.stringify(manifest, null, 2));
  console.log('Manifest written to .audit/images_manifest.json');
}

run();

