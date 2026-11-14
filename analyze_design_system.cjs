const fs = require('fs');

const css = fs.readFileSync('ref_index.css', 'utf8');

// Color variables
const rootVars = css.match(/:root\s*\{([^}]+)\}/)[1];
const varLines = rootVars.split(';').map(s => s.trim()).filter(Boolean);

console.log('=== CSS VARIABLES ===');
console.log(varLines.join('\n'));

// Keyframes
const keyframes = [...css.matchAll(/@keyframes\s+([^{]+)\{/g)].map(m => m[1].trim());
console.log('\n=== KEYFRAMES ===');
console.log([...new Set(keyframes)]);

// Media queries
const mediaQueries = [...css.matchAll(/@media\s*\(([^)]+)\)/g)].map(m => m[1].trim());
console.log('\n=== MEDIA QUERIES ===');
console.log([...new Set(mediaQueries)].slice(0, 20));

// Font faces
const fontFaces = [...css.matchAll(/@font-face\s*\{([^}]+)\}/g)].map(m => m[1].trim());
console.log('\n=== FONT FACES ===');
console.log(fontFaces);

