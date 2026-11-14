const fs = require('fs');
const html = fs.readFileSync('.audit/reference_dom/policies.html', 'utf8');

const mainMatch = html.match(/<main[^>]*>([\s\S]*?)<\/main>/i);
if (mainMatch) {
  console.log(mainMatch[1].replace(/<svg[\s\S]*?<\/svg>/gi, '').slice(0, 2000));
}
