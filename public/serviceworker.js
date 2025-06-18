self.addEventListener('install', function(event) {
  // Perform install steps
  console.log('Service Worker installing.');
});

self.addEventListener('fetch', function(event) {
  // You can add custom fetch logic here
});