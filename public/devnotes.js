document.getElementById('baseCSS').href = localStorage.getItem('selectedCSS');

window.addEventListener('load', () => {
    const styleSelector = document.getElementById('styleSelector');

    if (styleSelector) {
        styleSelector.addEventListener('change', e => {
            const newCSS = '/style/' + e.target.value + '.css';

            document.getElementById('baseCSS').href = newCSS;

            localStorage.setItem('selectedCSS', newCSS);
        });
    }

});
