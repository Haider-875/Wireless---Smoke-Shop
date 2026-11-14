const fs = require('fs');
const html = fs.readFileSync('ref_rendered_dom.html', 'utf8');

const idx = html.indexOf('Fog Guard Clear Case');
if (idx !== -1) {
  console.log(html.slice(Math.max(0, idx - 400), Math.min(html.length, idx + 600)));
}

