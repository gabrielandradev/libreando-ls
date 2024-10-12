for (let i = 1; i <= 3; i++) {
    const admin_btn = document.querySelector(`#btn-${i}`);
    const dropdown_menu = document.querySelector(`#menu-${i}`);
    admin_btn.addEventListener('click', function () {
        dropdown_menu.classList.toggle('active');
        admin_btn.classList.toggle('active');
    });
}

const smartphone_query = window.matchMedia('(max-width: 480px)');
function smartphone_mode(e) {
    if(e.matches) {
        const buttons = [];
        const menus = [];
        for (let i = 1; i <= 3; i++) {
            const admin_btn = document.querySelector(`#btn-${i}`);
            const dropdown_menu = document.querySelector(`#menu-${i}`);
            dropdown_menu.classList.remove('active');
            admin_btn.classList.remove('active');
            buttons.push(admin_btn);
            menus.push(dropdown_menu);
        }

            buttons.forEach((button, index) => {
        button.addEventListener('click', () => {
                buttons.forEach((btn, i) => {
                    btn.classList.remove('active');
                    menus[i].classList.remove('active');
                });
                button.classList.add('active');
                menus[index].classList.add('active');
            });
        });

    }
}
smartphone_query.addListener(smartphone_mode);
smartphone_mode(smartphone_query);