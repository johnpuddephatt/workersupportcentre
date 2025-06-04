import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import.meta.glob(['../images/**', '../fonts/**']);

document.querySelectorAll('summary').forEach((summary) => {
  summary.addEventListener('click', () => {
    document.querySelectorAll('details').forEach((details) => {
      if (details !== summary.parentElement) {
        details.removeAttribute('open');
      }
    });
  });
});
