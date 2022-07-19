<?php use Controller\PostController;

include 'assets/include/header.php'; ?>

<!-- home section start -->
<section class="home" id="home">
    <div class="max-width">
        <div class="home-content">
            <div class="text-1">'Hello World'; &nbsp; getMyFullName();</div>
            <div class="text-2">> <?= config('info/name') ?></div>
            <div class="text-3">getMyStatus(); <span> <?= config('info/status') ?></span></div>
            <a href="#about" title="Shko te About me">getAboutMe();</a>
        </div>
    </div>
</section>


<!-- about section start -->

<!-- about section start -->
<section class="about " id="about">
    <div class="max-width">
        <h2 class="title">getAboutMe();</h2>
        <div class="about-content">
            <div class="column left">
                <img loading="lazy" src="assets/img/profile-1.jpeg" alt="Banner Image">
            </div>
            <div class="column right">
                <h2 class="text">Unë jamë <?= config('info/name') ?> &nbsp;<span> <?= config('info/status') ?></span>
                </h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ut voluptatum eveniet doloremque
                    autem excepturi eaque, sit laboriosam voluptatem nisi delectus. Facere explicabo hic minus
                    accusamus alias fuga nihil dolorum quae. Explicabo illo unde, odio consequatur ipsam possimus
                    veritatis, placeat, ab molestiae velit inventore exercitationem consequuntur blanditiis omnis
                    beatae. Dolor iste excepturi ratione soluta quas culpa voluptatum repudiandae harum non.</p>
                <a href="<?= config('info/cv') ?> " target="_blank" title="Shiko CV-n"><i>getCV('pdf');</i></a>
                <a href="<?= config('info/github') ?> " target="_blank" title="Shiko CV-n"><i>goTo('github');</i></a>
            </div>
        </div>
    </div>
</section>
<style>
    @media (max-width: 928px) {

    .about .about-content .left img {
        height: 300px;
        width: 300px;
    }
}

    @media (max-width: 777px) {

    .about .about-content .left img {
        height: 260px;
        width: 260px;
    }
}
</style>

<!-- services section start -->
<section class="services" id="services">
    <div class="max-width">
        <h2 class="title" style="color: var(--light-color)">getMyServices();</h2>
        <div class="serv-content">
            <div class="card shadow">
                <div class="box">
                    <i class="fas fa-paint-brush"></i>
                    <div class="text">Web Design</div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem quia sunt, quasi quo illo enim.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <i class="fas fa-chart-line"></i>
                    <div class="text">Advertising</div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem quia sunt, quasi quo illo enim.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <i class="fas fa-code"></i>
                    <div class="text">Web Developer</div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem quia sunt, quasi quo illo enim.
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- skills section start -->
<section class="skills" id="skills">
    <div class="max-width">
        <h2 class="title" style="color: var(--light-color)">getMySkills();</h2>
        <div class="skills-content" style="justify-content:center">
            <?php
            $skills = [
                'HTML|CSS|JS' => 'assets/img/frontend.webp',
                'bootstrap' => 'assets/img/bootstrap.webp',
                'php' => 'assets/img/php.webp',
                'mysql' => 'assets/img/mysql.webp',
                'laravel' => 'assets/img/laravel.webp',
                'livewire' => 'assets/img/livewire.webp',
                'aplinejs' => 'assets/img/alpine.webp',
            ];

            ?>
            <div class="skills-img">
                <?php foreach ($skills as $skill => $img) : ?>
                    <div class="skill">
                        <img loading="lazy" src="<?= $img ?>" alt="<?= $skill ?>" title="<?= $skill ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <style>
                .skills .skills-content .skills-img img {
                    width: 161px;
                    padding: 10px;
                    border-radius: 30px;
                }

                .skills .skills-content .skills-img img:hover {
                    opacity: 0.7;
                    transition: 0.4s all;

                }

                .skills .skills-content .skills-img {
                    max-width: 650px;
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                }
            </style>
            <!-- <div class="column left">
                <div class="text">My creative skills & experiences.</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, ratione error est recusandae consequatur, iusto illum deleniti quidem impedit, quos quaerat quis minima sequi. Cupiditate recusandae laudantium esse, harum animi aspernatur quisquam et delectus ipsum quam alias quaerat? Quasi hic quidem illum. Ad delectus natus aut hic explicabo minus quod.</p>
                <a href="#">Read more</a>
            </div>
            <div class="column right">
                <div class="bars">
                    <div class="info">
                        <span>HTML</span>
                        <span>90%</span>
                    </div>
                    <div class="line html"></div>
                </div>
                <div class="bars">
                    <div class="info">
                        <span>CSS</span>
                        <span>60%</span>
                    </div>
                    <div class="line css"></div>
                </div>
                <div class="bars">
                    <div class="info">
                        <span>JavaScript</span>
                        <span>80%</span>
                    </div>
                    <div class="line js"></div>
                </div>
                <div class="bars">
                    <div class="info">
                        <span>PHP</span>
                        <span>50%</span>
                    </div>
                    <div class="line php"></div>
                </div>
                <div class="bars">
                    <div class="info">
                        <span>MySQL</span>
                        <span>70%</span>
                    </div>
                    <div class="line mysql"></div>
                </div>
            </div> -->
        </div>
    </div>
</section>


<?php
//SELECT
//*
//FROM post_categories
//        INNER JOIN posts ON post_categories.post_id = posts.id
//        INNER JOIN categories ON post_categories.categories_id = categories.id
//        WHERE posts.status = 1

$post = new PostController();
$db = DB::getDB();
$posts = $post->db->sql('
        SELECT 
           * 
        FROM
        posts ORDER BY id ASC LIMIT 3
')->results();
//post categories
//echo "<pre/ >";
//print_r($post_categories);
//print_r($posts);
// die();

?>
<section class="blog max-width" id="blog">
    <?php foreach ($posts as $post): ?>
        <a href="single.php?slug=<?= $post->slug ?> ">
            <div class="card">
                <div class="card__header">
                    <img loading="lazy" src="<?= $post->image ?>" alt="<?= $post->title ?>" title="<?= $post->title ?>"
                         class="" width="600">
                </div>
                <div class="card__body">
                    <?php
                    $post_categories = $db->sql('
                            SELECT 
                               * 
                            FROM
                            post_categories 
                            INNER JOIN categories on post_categories.categories_id = categories.id
                            where post_categories.post_id = ' . $post->id . '
                          LIMIT 3'
                    )->results();
                    ?>
                    <div class="tags" style="display:flex;">
                        <?php foreach ($post_categories as $category): ?>
                            <span class="tag tag-red"><?= $category->title ?></span>
                        <?php endforeach; ?>
                    </div>

                    <!--                    <span class="tag tag-red">tag tag-red</span>-->
                    <h4><?= substr($post->title , 0, 32) . '...'; ?></h4>
                    <p><?= substr($post->body , 0, 50) . '...';?></p>
                </div>
                <div class="card__footer">
                    <div class="user">
                        <img loading="lazy" src="assets/img/logo.svg" width="40px" alt="user__image"
                             class="user__image">
                        <div class="user__info">
                            <h5>Alpet Gexha</h5>
                            <small><?= Time::timeAgo2($post->created_at) ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</section>


<!-- contact section start -->
<section class="contact" id="contact">
    <div class="max-width">
        <h2 class="title">getContactMe();</h2>
        <div class="contact-content">
            <div class="column left">
                <div class="text">Get in Touch</div>
                <p>
                    Ndjehini të lirë të kontaktoni për çdo gjë që doni
                </p>
                <div class="icons">
                    <div class="row">
                        <i class="fas fa-phone"></i>
                        <div class="info">
                            <div class="head">Tel:</div>
                            <div class="sub-title"><?= config('info/phone') ?> </div>
                        </div>
                    </div>
                    <div class="row">
                    <i class="fa-brands fa-linkedin"></i>
                        <div class="info">
                            <div class="head">Linkedin :</div>
                            <div class="sub-title" style="color: var(--light-colot)"><a href="<?= config('info/linkedin') ?>">Alpet Gexha</a> </div>
                        </div>
                    </div>
                    <div class="row">
                        <i class="fas fa-envelope"></i>
                        <div class="info">
                            <div class="head">Email:</div>
                            <div class="sub-title"><?= config('info/email') ?> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column right">


                <?php

                if (Session::exist('success')) {
                    echo '<span style="color: green">' . Session::flash('success') . '</span>';
                }

                // echo Input::get('username');

                if (Input::exist()) {
                    if (Token::check(Input::get('token'))) {
                        $x = new Validation();
                        $x->check($_POST, ['emri' => ['req' => true, 'min' => 3, 'max' => 255], 'email' => ['req' => true, 'min' => 3, 'max' => 255], 'subject' => ['req' => true, 'min' => 3, 'max' => 255], 'message' => ['req' => true, 'min' => 20, 'max' => 255],]);
                        if ($x->passed()) {

                            $db = DB::getDB();

                            $db->insert('contacts', ['name' => Input::get('emri'), 'email' => Input::get('email'), 'subject' => Input::get('subject'), 'message' => Input::get('message'), 'created_at' => date('Y-m-d H:i:s'),]);
                            header('location: index');
                            Session::flash('success', 'Mesazhi u dergua me sukses! Faleminderit për suportin tuaj!');
                            Input::reset();
//                            Go::to('/index.php');
                        } else {
                            $x->getError();
                        }
                    }
                }

                ?>
                <div class="text">Më Shkruani</div>
                <form action="" method="POST">
                    <div class="fields">
                        <div class="field name">
                            <input class="input-form" type="text" name="emri" placeholder="Emri" required autocomplete
                                   value="<?= e(Input::get('emri')) ?>"
                                   oninvalid="this.setCustomValidity('Ju lutem shkruani Emrin');"
                                   oninput="this.setCustomValidity('');">
                        </div>
                        <div class="field email">
                            <input class="input-form" type="email" name="email" value="<?= e(Input::get('email')) ?>"
                                   placeholder="Email" required autocomplete
                                   oninvalid="this.setCustomValidity('Ju lutem shkruani Emailin');"
                                   oninput="this.setCustomValidity('');">
                        </div>
                    </div>
                    <div class="field">
                        <input class="input-form" type="text" name="subject" placeholder="Subjekti" required
                               autocomplete value="<?= e(Input::get('subject')) ?>"
                               oninvalid="this.setCustomValidity('Ju lutem shkruani Subjektin')"
                               oninput=" this.setCustomValidity('')" ;>
                    </div>
                    <div class="field textarea">
                        <textarea class="textarea-form" name="message" cols="30" rows="10" placeholder="Message.."
                                  required><?= e(Input::get('message')) ?></textarea>
                    </div>
                    <div class="button-area">
                        <!-- style="display: flex; justify-content: end;" -->
                        <input type="hidden" name="token" value="<?= Token::get() ?>"/>
                        <input type="submit" class="btn" value="sendMessage();"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    .active {
        color: var(--nav-link) !important;
    }
</style>

<script>
    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
            if (all) {
                selectEl.forEach(e => e.addEventListener(type, listener))
            } else {
                selectEl.addEventListener(type, listener)
            }
        }
    }

    /**
     * Easy on scroll event listener
     */
    const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
    }

    /**
     * Scroll with ofset on page load with hash links in the url
     */
    window.addEventListener('load', () => {
        if (window.location.hash) {
            if (select(window.location.hash)) {
                scrollto(window.location.hash)
            }
        }
    });
    /**
     * Navbar links active state on scroll
     */

    let navbarlinks = select('.navbar .menu .menu-btn', true)
    const navbarlinksActive = () => {
        let position = window.scrollY + 200
        navbarlinks.forEach(navbarlink => {
            if (!navbarlink.hash) return
            let section = select(navbarlink.hash)
            if (!section) return
            if (position >= section.offsetTop && position <= (section.offsetTop + section
                .offsetHeight)) {
                navbarlink.classList.add('active')
            } else {
                navbarlink.classList.remove('active')
            }
        })
    }
    window.addEventListener('load', navbarlinksActive)
    onscroll(document, navbarlinksActive)
</script>

<?php include 'assets/include/footer.php'; ?>

</body>

</html>