const { execFileSync } = require('child_process');
const path = require('path');
const fs = require('fs');

const chromePath = 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe';
const outDir = path.join(__dirname, '.audit', 'reference_screenshots');
if (!fs.existsSync(outDir)) {
  fs.mkdirSync(outDir, { recursive: true });
}

const viewports = [
  { name: '390', width: 390, height: 844 },
  { name: '576', width: 576, height: 900 },
  { name: '768', width: 768, height: 1024 },
  { name: '1024', width: 1024, height: 768 },
  { name: '1440', width: 1440, height: 900 },
  { name: '1920', width: 1920, height: 1080 }
];

const pages = [
  { name: 'homepage', url: 'https://fanatic-luxe-mart-go.base44.app/' },
  { name: 'repairs', url: 'https://fanatic-luxe-mart-go.base44.app/repairs' },
  { name: 'shop', url: 'https://fanatic-luxe-mart-go.base44.app/shop' },
  { name: 'product_detail', url: 'https://fanatic-luxe-mart-go.base44.app/shop/6af3bef41141871615af5052' },
  { name: 'policies', url: 'https://fanatic-luxe-mart-go.base44.app/policies' }
];

console.log('Starting screenshot captures across viewports via execFileSync...');

for (const p of pages) {
  for (const vp of viewports) {
    const filename = `ref_${p.name}_${vp.name}px.png`;
    const fullPath = path.join(outDir, filename);
    console.log(`Capturing ${p.name} at ${vp.width}x${vp.height} -> ${filename}...`);
    try {
      execFileSync(chromePath, [
        '--headless',
        '--disable-gpu',
        '--hide-scrollbars',
        '--virtual-time-budget=6000',
        `--window-size=${vp.width},${vp.height}`,
        `--screenshot=${fullPath}`,
        p.url
      ], { stdio: 'pipe', timeout: 30000 });

      if (fs.existsSync(fullPath)) {
        const stats = fs.statSync(fullPath);
        console.log(`  -> SUCCESS: ${stats.size} bytes`);
      } else {
        console.warn(`  -> File not created for ${filename}`);
      }
    } catch (err) {
      console.error(`  -> ERROR capturing ${filename}:`, err.message);
    }
  }
}

console.log('All screenshot captures completed.');
