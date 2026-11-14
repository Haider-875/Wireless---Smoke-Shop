const fs = require('fs');

const html = fs.readFileSync('ref_rendered_dom.html', 'utf8');

// Anchors
const linkMatches = [...html.matchAll(/<a[^>]+href=["']([^"']+)["'][^>]*>([\s\S]*?)<\/a>/gi)];
const links = linkMatches.map(m => ({
  href: m[1],
  text: m[2].replace(/<[^>]+>/g, '').replace(/\s+/g, ' ').trim()
}));

// Images
const imgMatches = [...html.matchAll(/<img[^>]+src=["']([^"']+)["'][^>]*>/gi)];
const imgs = imgMatches.map(m => {
  const src = (m[0].match(/src=["']([^"']+)["']/) || [])[1];
  const alt = (m[0].match(/alt=["']([^"']+)["']/) || [])[1];
  return { src, alt };
});

// Buttons
const btnMatches = [...html.matchAll(/<button[^>]*>([\s\S]*?)<\/button>/gi)];
const buttons = btnMatches.map(m => m[1].replace(/<[^>]+>/g, '').replace(/\s+/g, ' ').trim());

// Headings
const hMatches = [...html.matchAll(/<(h[1-6])[^>]*>([\s\S]*?)<\/\1>/gi)];
const headings = hMatches.map(m => ({
  tag: m[1],
  text: m[2].replace(/<[^>]+>/g, '').replace(/\s+/g, ' ').trim()
}));

console.log('=== DISTINCT INTERNAL LINKS ===');
const internalLinks = [...new Set(links.map(l => l.href))];
console.log(internalLinks);

console.log('\n=== SAMPLE LINKS WITH LABELS ===');
console.log(links.slice(0, 30));

console.log('\n=== HEADINGS ===');
console.log(headings);

console.log('\n=== TOTAL IMAGES:', imgs.length, '===');
console.log(imgs);

console.log('\n=== BUTTONS ===');
console.log([...new Set(buttons)].filter(Boolean));

