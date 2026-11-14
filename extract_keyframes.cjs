const fs = require('fs');
const css = fs.readFileSync('ref_index.css', 'utf8');

const kfs = ['marquee', 'rise'];
kfs.forEach(k => {
  const regex = new RegExp(`@keyframes\\s+${k}\\s*\\{[^}]+\\}`, 'g');
  console.log(`=== @keyframes ${k} ===`);
  console.log(css.match(regex));
});
