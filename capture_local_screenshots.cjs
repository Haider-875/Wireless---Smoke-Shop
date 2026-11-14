const { execFileSync } = require('child_process');
const path = require('path');
const fs = require('fs');

const chromePath = 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe';
const outDir = path.join(__dirname, '.audit', 'local_screenshots');
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
  { name: 'homepage', url: 'http://127.0.0.1:8000/' },
  { name: 'repairs', url: 'http://127.0.0.1:8000/repairs' },
  { name: 'shop', url: 'http://127.0.0.1:8000/shop' },
  { name: 'product_detail', url: 'http://127.0.0.1:8000/shop/midnight-ice-20k-disposable' },
  { name: 'policies', url: 'http://127.0.0.1:8000/policies' }
];

console.log('Starting local screenshot captures across all 6 viewports...');

for (const p of pages) {
  for (const vp of viewports) {
    const filename = `local_${p.name}_${vp.name}px.png`;
    const fullPath = path.join(outDir, filename);
    console.log(`Capturing ${p.name} at ${vp.width}x${vp.height} -> ${filename}...`);
    try {
      execFileSync(chromePath, [
        '--headless',
        '--disable-gpu',
        '--hide-scrollbars',
        '--virtual-time-budget=3000',
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

console.log('All local screenshot captures completed.');
