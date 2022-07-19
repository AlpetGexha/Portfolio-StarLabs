</main>
</div>

<footer>
        <span>Created By <a href="https://www.github.com/AlpetGexh">AlpetG</a> | <span
                class="far fa-copyright"></span> 2022.</span>
</footer>

<script>
    const menu_toggle = document.querySelector('.menu-toggle');
    const sidebar = document.querySelector('.sidebar');

    menu_toggle.addEventListener('click', () => {
        menu_toggle.classList.toggle('is-active');
        sidebar.classList.toggle('is-active');
    });
</script>


<script src="../../assets/js/app.js"></script>