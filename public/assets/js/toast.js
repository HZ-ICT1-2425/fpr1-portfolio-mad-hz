window.addEventListener('DOMContentLoaded', () => {
    const toast = document.getElementById('toast');

    setTimeout(() => {
        toast.classList.remove('-translate-y-full');
        toast.classList.add('translate-y-5');
    }, 100);

    setTimeout(() => {
        toast.classList.remove('translate-y-5');
        toast.classList.add('-translate-y-full');
    }, 3000);

    setTimeout(() => {
        toast.remove();
    }, 3500);
});
