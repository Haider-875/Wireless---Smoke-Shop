const fs = require('fs');

const html = fs.readFileSync('ref_rendered_dom.html', 'utf8');

const idx = html.indexOf('Are you 21 or older?');
if (idx !== -1) {
  console.log('--- AROUND AGE GATE ---');
  console.log(html.slice(Math.max(0, idx - 400), Math.min(html.length, idx + 1000)));
} else {
  console.log('Not found');
}

