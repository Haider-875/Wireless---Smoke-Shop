const fs = require('fs');
const css = fs.readFileSync('ref_index.css', 'utf8');

const classes = ['eyebrow', 'font-serif-display', 'marquee-track', 'glow-steel', 'glow-platinum', 'reveal'];

classes.forEach(c => {
  const regex = new RegExp(`\\.${c}[^{]*\\{[^}]+\\}`, 'g');
  const matches = css.match(regex);
  console.log(`=== .${c} ===`);
  console.log(matches ? matches.join('\n') : 'Not found as direct class');
});

