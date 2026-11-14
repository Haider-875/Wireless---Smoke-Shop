const fs = require('fs');

const html = fs.readFileSync('ref_rendered_dom.html', 'utf8');

// Search for cart / bag elements
const cartMatches = [...html.matchAll(/<div[^>]*class=["'][^"']*(?:cart|drawer|sheet|dialog|modal)[^"']*["'][^>]*>([\s\S]*?)<\/div>/gi)];
console.log(`Found ${cartMatches.length} dialog/modal/drawer matches.`);

// Look for cart text
const cartSnippets = [...html.matchAll(/(?:Your bag|Shopping bag|Subtotal|Checkout|Bag is empty|Free delivery over)/gi)].map(m => m[0]);
console.log('Cart text mentions:', cartSnippets);

// Look for cart provider script or state
const cartScriptMatch = html.match(/CartProvider[\s\S]*?<\/script>/i);
console.log('Cart script match:', cartScriptMatch ? 'Found' : 'Not found');

