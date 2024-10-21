import PhotoSwipeLightbox from '/photoswipe/photoswipe-lightbox.esm.js';
const lightbox = new PhotoSwipeLightbox({
    gallery: '#mygallery',
    children: 'a',
    pswpModule: () => import('/photoswipe/photoswipe.esm.js'),
    bgOpacity: 0.2,
    spacing: 0.5, // 50% of viewport width
});
lightbox.init();