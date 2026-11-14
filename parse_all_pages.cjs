const fs = require('fs');
const path = require('path');

const domDir = path.join(__dirname, '.audit', 'reference_dom');

// 1. REPAIRS PAGE
console.log('=============================');
console.log('=== 1. REPAIRS PAGE AUDIT ===');
console.log('=============================');
const repairsHtml = fs.readFileSync(path.join(domDir, 'repairs.html'), 'utf8');
const repairsHeadings = [...repairsHtml.matchAll(/<(h[1-6])[^>]*>([\s\S]*?)<\/\1>/gi)].map(m => ({
  tag: m[1],
  text: m[2].replace(/<[^>]+>/g, '').trim()
}));
console.log('Repairs Headings:', repairsHeadings);

// 2. SHOP PAGE
console.log('\n==========================');
console.log('=== 2. SHOP PAGE AUDIT ===');
console.log('==========================');
const shopHtml = fs.readFileSync(path.join(domDir, 'shop.html'), 'utf8');
const shopHeadings = [...shopHtml.matchAll(/<(h[1-6])[^>]*>([\s\S]*?)<\/\1>/gi)].map(m => ({
  tag: m[1],
  text: m[2].replace(/<[^>]+>/g, '').trim()
}));
console.log('Shop Headings:', shopHeadings);

// Extract category filter buttons/tabs
const filterMatches = [...shopHtml.matchAll(/<button[^>]*>([\s\S]*?)<\/button>/gi)].map(m => m[1].replace(/<[^>]+>/g, '').trim()).filter(Boolean);
console.log('Shop buttons/filters:', [...new Set(filterMatches)]);

// 3. PRODUCT DETAIL PAGE
console.log('\n====================================');
console.log('=== 3. PRODUCT DETAIL PAGE AUDIT ===');
console.log('====================================');
const pdpHtml = fs.readFileSync(path.join(domDir, 'product_detail.html'), 'utf8');
const pdpHeadings = [...pdpHtml.matchAll(/<(h[1-6])[^>]*>([\s\S]*?)<\/\1>/gi)].map(m => ({
  tag: m[1],
  text: m[2].replace(/<[^>]+>/g, '').trim()
}));
console.log('PDP Headings:', pdpHeadings);

// 4. POLICIES PAGE
console.log('\n==============================');
console.log('=== 4. POLICIES PAGE AUDIT ===');
console.log('==============================');
const policiesHtml = fs.readFileSync(path.join(domDir, 'policies.html'), 'utf8');
const policiesHeadings = [...policiesHtml.matchAll(/<(h[1-6])[^>]*>([\s\S]*?)<\/\1>/gi)].map(m => ({
  tag: m[1],
  text: m[2].replace(/<[^>]+>/g, '').trim()
}));
console.log('Policies Headings:', policiesHeadings);

// 5. ACCOUNT PAGE
console.log('\n=============================');
console.log('=== 5. ACCOUNT PAGE AUDIT ===');
console.log('=============================');
const accountHtml = fs.readFileSync(path.join(domDir, 'account.html'), 'utf8');
const accountHeadings = [...accountHtml.matchAll(/<(h[1-6])[^>]*>([\s\S]*?)<\/\1>/gi)].map(m => ({
  tag: m[1],
  text: m[2].replace(/<[^>]+>/g, '').trim()
}));
console.log('Account Headings:', accountHeadings);

