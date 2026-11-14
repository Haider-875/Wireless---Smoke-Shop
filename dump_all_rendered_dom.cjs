const { execFileSync } = require('child_process');
const path = require('path');
const fs = require('fs');

const chromePath = 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe';
const outDir = path.join(__dirname, '.audit', 'reference_dom');
if (!fs.existsSync(outDir)) {
  fs.mkdirSync(outDir, { recursive: true });
}

const pages = [
  { name: 'repairs', url: 'https://fanatic-luxe-mart-go.base44.app/repairs' },
  { name: 'shop', url: 'https://fanatic-luxe-mart-go.base44.app/shop' },
  { name: 'product_detail', url: 'https://fanatic-luxe-mart-go.base44.app/shop/6af3bef41141871615af5052' },
  { name: 'policies', url: 'https://fanatic-luxe-mart-go.base44.app/policies' },
  { name: 'account', url: 'https://fanatic-luxe-mart-go.base44.app/account' }
];

console.log('Dumping rendered DOM for each page...');

for (const p of pages) {
  const fullPath = path.join(outDir, `${p.name}.html`);
  console.log(`Dumping ${p.name} (${p.url}) -> ${fullPath}...`);
  try {
    const stdout = execFileSync(chromePath, [
      '--headless',
      '--disable-gpu',
      '--virtual-time-budget=6000',
      '--dump-dom',
      p.url
    ], { maxBuffer: 10 * 1024 * 1024, timeout: 30000 });

    fs.writeFileSync(fullPath, stdout);
    console.log(`  -> SUCCESS: ${fs.statSync(fullPath).size} bytes`);
  } catch (err) {
    console.error(`  -> ERROR dumping ${p.name}:`, err.message);
  }
}

console.log('All rendered DOM dumps completed.');

