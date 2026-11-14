const fs = require('fs');

const html = fs.readFileSync('ref_rendered_dom.html', 'utf8');

// Ticker items
const marqueeMatch = html.match(/marquee-track[\s\S]*?<\/div>\s*<\/div>/i);
if (marqueeMatch) {
  const items = [...marqueeMatch[0].matchAll(/<span[^>]*class=["'][^"']*eyebrow[^"']*["'][^>]*>([\s\S]*?)<\/span>/gi)].map(m => m[1].trim());
  console.log('=== MARQUEE / TICKER ITEMS ===');
  console.log([...new Set(items)]);
}

// Hero section details
console.log('\n=== HERO SECTION ===');
const heroMatch = html.match(/<section[^>]*>([\s\S]*?)<\/section>/i);
if (heroMatch) {
  console.log(heroMatch[0].replace(/<svg[\s\S]*?<\/svg>/gi, '[SVG]').slice(0, 1500));
}

// Section breakdown
const allSections = [...html.matchAll(/<section[^>]*>([\s\S]*?)<\/section>/gi)];
console.log(`\n=== FOUND ${allSections.length} SECTIONS ===`);
allSections.forEach((sec, idx) => {
  const heading = sec[1].match(/<h[1-6][^>]*>([\s\S]*?)<\/h[1-6]>/i);
  console.log(`Section ${idx + 1}: Heading: ${heading ? heading[1].replace(/<[^>]+>/g, '').trim() : 'None'}`);
});
