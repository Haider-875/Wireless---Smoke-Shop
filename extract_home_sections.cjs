const fs = require('fs');
const html = fs.readFileSync('ref_rendered_dom.html', 'utf8');

const mainMatch = html.match(/<main[^>]*>([\s\S]*?)<\/main>/i);
if (mainMatch) {
  const sections = [...mainMatch[1].matchAll(/<section[^>]*>([\s\S]*?)<\/section>/gi)];
  console.log(`Found ${sections.length} sections in main.`);
  sections.forEach((s, idx) => {
    console.log(`\n================ SECTION ${idx + 1} ================`);
    console.log(s[0].slice(0, 1000));
  });
}
