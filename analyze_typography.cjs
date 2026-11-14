const fs = require('fs');

const css = fs.readFileSync('ref_index.css', 'utf8');

console.log('CSS length:', css.length);

// Find font-family occurrences
const fontFamilies = css.match(/font-family:[^;}]+/g) || [];
console.log('Unique font families:');
console.log([...new Set(fontFamilies)]);

// Find .font-display, .font-serif, .eyebrow, .num, etc.
const displayMatches = css.match(/\.font-display[^{]*\{[^}]*\}/g) || [];
console.log('\n.font-display:', displayMatches);

const serifMatches = css.match(/\.font-serif[^{]*\{[^}]*\}/g) || [];
console.log('\n.font-serif:', serifMatches);

const eyebrowMatches = css.match(/\.eyebrow[^{]*\{[^}]*\}/g) || [];
console.log('\n.eyebrow:', eyebrowMatches);

const numMatches = css.match(/\.num[^{]*\{[^}]*\}/g) || [];
console.log('\n.num:', numMatches);
