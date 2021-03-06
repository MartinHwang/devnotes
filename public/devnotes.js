let selectedStyle = localStorage.getItem('styleCSS');

if (selectedStyle) {
    const selectedSubStyle = localStorage.getItem('subStyleCSS');

    document.getElementById('baseCSS').href = selectedStyle;

    if (selectedSubStyle) {
        const newSubStyle = document.createElement('link');

        newSubStyle.href = selectedSubStyle;
        newSubStyle.id   = 'subStyle';
        newSubStyle.rel  = 'stylesheet';
        newSubStyle.type = 'text/css';
        baseCSS.insertAdjacentElement('afterend', newSubStyle);
    }
}

window.addEventListener('load', () => {
    const baseCSS       = document.getElementById('baseCSS');
    const styleSelector = document.getElementById('styleSelector');

    if (styleSelector) {
        styleSelector.addEventListener('change', e => {
            const newCSS   = '/style/' + e.target.value + '.css';
            const subStyle = document.getElementById('subStyle');

            baseCSS.href = newCSS;
            localStorage.setItem('styleCSS', newCSS);
            selectedStyle = newCSS;

            // Remove sub-style on style change
            if (subStyle) {
                subStyle.remove();
                localStorage.removeItem('subStyleCSS');
            }
        });
    }

    const subStyleSelector = document.getElementById('subStyleSelector');

    if (selectedStyle && subStyleSelector) {
        subStyleSelector.addEventListener('change', e => {
            const subStyle = document.getElementById('subStyle');

            if (e.target.value) {
                const newCSS      = selectedStyle.replace('.css', '-' + e.target.value + '.css');
                const newSubStyle = document.createElement('link');

                if (subStyle) {
                    subStyle.href = newCSS;

                } else {
                    newSubStyle.href = newCSS;
                    newSubStyle.id   = 'subStyle';
                    newSubStyle.rel  = 'stylesheet';
                    newSubStyle.type = 'text/css';
                    baseCSS.insertAdjacentElement('afterend', newSubStyle);
                }

                localStorage.setItem('subStyleCSS', newCSS);

            } else if (subStyle) {
                subStyle.remove();
                localStorage.removeItem('subStyleCSS');
            }
        });
    }
});
