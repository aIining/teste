<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://dev.sellix.io/v1/categories',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer tokenhere', //settings -> secturity -> api key
        // 'X-Sellix-Merchant: store name here' //if you have multiple store

    ),
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
));

$response = curl_exec($curl);

if ($response === false) {
    $error = curl_error($curl);
    curl_close($curl);
    die("Curl error: $error");
}

curl_close($curl);
$data = json_decode($response, true);

$categories = $data['data']['categories'];




function formatCustomFields($customFields)
{
    $formatted = '';
    foreach ($customFields as $field) {
        if ($field['type'] == 'hidden') {
            $items = explode(';', $field['name']);
            foreach ($items as $item) {
                $formatted .= '<div class="flex items-center mt-2 ml-3 "><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.75417 16.5L3.52917 11.275L4.83542 9.96872L8.75417 13.8875L17.1646 5.47705L18.4708 6.7833L8.75417 16.5Z" fill="white"/></svg><span class="ml-2">' . $item . '</span></div>';
            }
        }
    }
    return $formatted;
}
?>


<!DOCTYPE html>
<html lang="en" class="scroll-smooth scroll- ">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./assets/styles/output.css" rel="stylesheet" />
    <title>ACCSHUB - Account Store</title>
    <link rel="icon" href="assets/images/logo.png" />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
    <script src="https://cdn.sellix.io/static/js/embed.js"></script>

</head>

<body class="bg-[#171717] scroll-smooth scroll-p-[30px] ">
    <nav class="px-[10%] mx-auto py-3 fixed w-full z-50 top-0 transition-all bg-[#171717]" id="main-nav">
        <div class="flex justify-between items-center ">
            <div class="relative z-30">
                <a href="/">
                    <img src="assets/images/logo.png" alt="" class="w-12" />
                </a>
            </div>

            <ul id="sidebar" class="flex flex-col fixed justify-center top-0 left-0 h-full w-[60%] max-w-[400px] z-20 md:flex-row md:static transform transition-transform duration-300 translate-x-[-100%] md:translate-x-0 bg-[#0E0E0E] md:bg-transparent">
                <li class="ml-8 my-2 md:my-0 text-white sora-bold uppercase">
                    <a href="/#services">Home</a>
                </li>
                <li class="ml-8 my-2 md:my-0 text-white sora-bold uppercase">
                    <a href="/#products">Products</a>
                </li>
                <li class="ml-8 my-2 md:my-0 text-white sora-bold uppercase">
                    <a href="/#feedbacks">Feedbacks</a>
                </li>
                <li class="ml-8 my-2 md:my-0 text-white sora-bold uppercase">
                    <a href="/#contacts">Contacts</a>
                </li>
            </ul>

            <div class="cursor-pointer z-30 relative md:hidden nav" onclick="toggleSidebar()">
                <div class="w-[36px] h-1 bg-white mb-1 rounded-sm"></div>
                <div class="w-[36px] h-1 bg-white mb-1 rounded-sm"></div>
                <div class="w-[36px] h-1 bg-white mb-1 rounded-sm"></div>
            </div>
        </div>
    </nav>

    <div class="mx-auto px-[5%] block py-[130px] md:py-[200px] bg-hero-pattern bg-cover relative">
        <img src="assets/images/stars.png" alt="" class="absolute z-1 top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">

        <div class="relative z-5">
            <h1 class="text-shadow-white sora-extrabold text-white text-[35px] md:text-[60px] max-w-[1000px] text-center mx-auto block" data-aos="fade-up">EXPLORE UNLIMITED DIGITAL POSSIBILITIES WITH <span class="text-blue">SELLIX</span> </h1>

            <p class="mt-10  text-center max-w-[654px] mx-auto block sora-extralight text-lightGray" data-aos="fade-up" data-aos-delay="100">Secure, Instant Access to Premium Accounts at Unbeatable Prices: Elevate Your Digital Experience with Confidence and Convenience</p>


            <a href="#products" class="bg-darkBlue border border-blue px-[54px] py-[15px] text-white sora-extrabold rounded-lg text-center mx-auto block max-w-[250px] mt-8 text-[13px] md:text-[16px]" data-aos="fade-up" data-aos-delay="200">Check Products</a>
        </div>

    </div>

    <div class="flex flex-wrap justify-between items-center gap-2 text-white mx-auto px-[5%]  max-w-[1920px] py-20 ">
        <div class="border border-gray px-[10%] md:px-[57px]  py-[40px] w-full lg:max-w-[32%] " data-aos="fade-up" data-aos-delay="100">
            <img src="./assets/images/globe.png" alt="" class="w-10 h-10 ">
            <h2 class="sora-extrabold mt-3">Wide Selection</h2>
            <p class="text-lightGray sora-extralight mt-3">Explore our comprehensive selection of digital products. Whether you need the latest streaming services, essential software tools, or unique digital content, our catalog is designed to cater to every aspect of your digital needs.</p>
        </div>

        <div class="border border-gray px-[10%] md:px-[57px]  py-[40px] w-full lg:max-w-[32%] " data-aos="fade-up" data-aos-delay="200">
            <img src="./assets/images/globe.png" alt="" class="w-10 h-10 ">

            <h2 class="sora-extrabold mt-3">Instant Delivery</h2>
            <p class="text-lightGray sora-extralight mt-3">Experience the convenience of instant access with every purchase. Our streamlined delivery system ensures that your digital products, from game keys to software licenses, are delivered directly to your inbox, ready to use within moments..</p>
        </div>

        <div class="border border-gray px-[10%] md:px-[57px]  py-[40px] w-full lg:max-w-[32%] " data-aos="fade-up" data-aos-delay="300">
            <img src="./assets/images/globe.png" alt="" class="w-10 h-10 ">

            <h2 class="sora-extrabold mt-3">Warrantied Accounts</h2>
            <p class="text-lightGray sora-extralight mt-3">Shop with confidence, knowing that all accounts come with a warranty. Our trusted warranty coverage means you can enjoy your digital purchases fully, with peace of mind knowing you’re supported by our commitment to quality and service.</p>
        </div>
    </div>

    <section class="max-w-[1400px] block py-[100px] mx-[5%] lg:mx-auto text-white" id="products">
        <div>
            <h3 class="text-white font-bold text-[35px] md:text-[45px] w-full max-w-[706.8px] mx-auto text-center sora-bold text-shadow-white" data-aos="fade-up">
                Ready to
                <span class="text-violet">get started?</span>
            </h3>

            <p class="text-white max-w-[706.8px] w-full mt-4 leading-7 font-extralight mx-auto text-center sora-normal" data-aos="fade-up" data-aos-delay="200">
                Shop with confidence, knowing that all accounts come with a warranty. Our trusted warranty coverage means you can enjoy your digital purchases fully, with peace of mind knowing you’re supported by our commitment to quality and service.
            </p>
        </div>
        <div class="flex items-center justify-center gap-3 mt-10 flex-wrap" id="category-buttons" data-aos="fade-up" data-aos-delay="300">
            <button class="sora-medium text-center min-w-[150px] px-6 py-4 text-black font-bold my-2 md:my-0 rounded-lg bg-white border border-gray hover:border-white bold w-full md:max-w-[171.98px] transition-all uppercase text-[14px] hover:text-shadow-white active-category" onclick="showProducts('all')">All</button>
            <?php foreach ($categories as $category) : ?>
                <button class="sora-medium text-center min-w-[150px] px-6 py-4 text-white font-bold my-2 md:my-0 rounded-lg bg-darkViolet border border-gray hover:border-white bold w-full md:max-w-[171.98px] transition-all uppercase text-[14px] hover:text-shadow-white" onclick="showProducts('<?php echo $category['uniqid']; ?>')">
                    <?php echo $category['title']; ?>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="flex items-center justify-center gap-3 mt-10 flex-wrap" id="search-bar" data-aos="fade-up" data-aos-delay="400">
            <input type="text" id="search-input" placeholder="Search products..." class="w-full md:max-w-[500px] px-4 py-2 rounded-lg bg-[#232323] border border-[#545454] text-white">
        </div>

        <div class="flex flex-wrap  justify-center gap-4 mt-20" id="product-container" data-aos="fade-up" data-aos-delay="500">
            <?php
            $allProducts = [];
            foreach ($categories as $category) :
                foreach ($category['products_bound'] as $product) :
                    $allProducts[$product['uniqid']] = $product;
            ?>
                    <div class="border border-gray max-w-[391px] bg-[#181818] w-full group product rounded-lg" data-category="<?php echo $category['uniqid']; ?>" data-title="<?php echo strtolower($product['title']); ?>">
                        <div class="">
                            <div class="h-[250px] w-full rounded-lg">
                                <img src="<?php echo "https://imagedelivery.net/95QNzrEeP7RU5l5WdbyrKw/" . $product['cloudflare_image_id'] . "/shopitem" ?>" alt="" class="h-full w-full object-cover rounded-lg">
                            </div>
                            <div class="p-10">
                                <div class="product-content">
                                    <p class="sora-bold text-white text-shadow-white"><?php echo $product['title']; ?></p>
                                    <h2 class="mt-8 sora-extralight text-white text-shadow-white">$<?php echo $product['price_display']; ?></h2>
                                </div>
                                <button class="bg-[#232323] mt-10 block mx-auto w-[180.76px] p-4 sora-bold border border-[#545454] rounded-md text-white hover:border-white transition-all" data-sellix-product="<?php echo $product['uniqid']; ?>" type="submit">
                                    Purchase
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </section>


    <section class="mx-auto px-[5%] block py-[70px]  relative " id="feedbacks">

        <div class="relative z-5">
            <h1 class="text-shadow-white sora-bold text-white text-[35px] md:text-[45px] max-w-[1000px] text-center mx-auto block" data-aos="fade-up" data-aos-delay="100">Feedbacks</h1>

            <p class="mt-10  text-center max-w-[654px] mx-auto block sora-extralight text-lightGray" data-aos="fade-up" data-aos-delay="200">Secure, Instant Access to Premium Accounts at Unbeatable Prices: Elevate Your Digital Experience with Confidence and Convenience</p>
        </div>


        <div class="flex flex-wrap text-white gap-6 items-center justify-center mt-10 " data-aos="fade-up" data-aos-delay="100">
            <div class="border border-gray p-10 max-w-[490px] rounded-lg">

                <div class="flex gap-1">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">


                </div>
                <h3 class="sora-bold text-shadow-white mt-4">Spotify 1 month</h3>


                <p class="mt-4 sora-extralight text-[14px]">Lorem ipsum dolor sit amet consectetur. Ut eget pretium dui arcu augue id et convallis faucibus. </p>

                <p class="text-shadow-white sora-bold mt-4">-AngelArt </p>
            </div>
            <div class="border border-gray p-10 max-w-[490px] rounded-lg">


                <div class="flex gap-1">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">


                </div>
                <h3 class="sora-bold text-shadow-white mt-4">Nitro 1 month</h3>


                <p class="mt-4 sora-extralight text-[14px]">Lorem ipsum dolor sit amet consectetur. Ut eget pretium dui arcu augue id et convallis faucibus. </p>

                <p class="text-shadow-white sora-bold mt-4">-AngelArt </p>
            </div>
            <div class="border border-gray p-10 max-w-[490px] rounded-lg">


                <div class="flex gap-1">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">


                </div>
                <h3 class="sora-bold text-shadow-white mt-4">14 Boost 3 months</h3>


                <p class="mt-4 sora-extralight text-[14px]">Lorem ipsum dolor sit amet consectetur. Ut eget pretium dui arcu augue id et convallis faucibus. </p>

                <p class="text-shadow-white sora-bold mt-4">-AngelArt </p>
            </div>
            <div class="border border-gray p-10 max-w-[490px] rounded-lg">


                <div class="flex gap-1">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">
                    <img src="./assets/images/star.png" alt="">


                </div>
                <h3 class="sora-bold text-shadow-white mt-4">10 - 20 Skinnned Accounts</h3>


                <p class="mt-4 sora-extralight text-[14px]">Lorem ipsum dolor sit amet consectetur. Ut eget pretium dui arcu augue id et convallis faucibus. </p>

                <p class="text-shadow-white sora-bold mt-4">-AngelArt </p>
            </div>

        </div>

    </section>



    <footer class="my-20" id="contacts">
        <h1 class="sora-extrabold text-shadow-white text-2xl text-white uppercase text-center">Have a question? Contact Us!</h1>


        <div class="flex gap-[10px] justify-center my-[16px]">
            <a href="https://discord.gg/angelart" target="_blank" class="group relative rounded-full p-px  text-zinc-400 duration-300 hover:text-zinc-100 hover:shadow-glow-discord" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:Rvraqla:" data-state="closed">
                <span class="absolute inset-0 overflow-hidden rounded-full">
                    <span class="absolute inset-0 rounded-full bg-[image:radial-gradient(75%_100%_at_50%_0%,#5d6af2_0%,rgba(56,189,248,0)_75%)] opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                    </span>
                </span>
                <div class="relative z-10 rounded-full bg-zinc-950 px-4 py-1.5 ring-1 ring-white/10">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" height="2em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M524.531,69.836a1.5,1.5,0,0,0-.764-.7A485.065,485.065,0,0,0,404.081,32.03a1.816,1.816,0,0,0-1.923.91,337.461,337.461,0,0,0-14.9,30.6,447.848,447.848,0,0,0-134.426,0,309.541,309.541,0,0,0-15.135-30.6,1.89,1.89,0,0,0-1.924-.91A483.689,483.689,0,0,0,116.085,69.137a1.712,1.712,0,0,0-.788.676C39.068,183.651,18.186,294.69,28.43,404.354a2.016,2.016,0,0,0,.765,1.375A487.666,487.666,0,0,0,176.02,479.918a1.9,1.9,0,0,0,2.063-.676A348.2,348.2,0,0,0,208.12,430.4a1.86,1.86,0,0,0-1.019-2.588,321.173,321.173,0,0,1-45.868-21.853,1.885,1.885,0,0,1-.185-3.126c3.082-2.309,6.166-4.711,9.109-7.137a1.819,1.819,0,0,1,1.9-.256c96.229,43.917,200.41,43.917,295.5,0a1.812,1.812,0,0,1,1.924.233c2.944,2.426,6.027,4.851,9.132,7.16a1.884,1.884,0,0,1-.162,3.126,301.407,301.407,0,0,1-45.89,21.83,1.875,1.875,0,0,0-1,2.611,391.055,391.055,0,0,0,30.014,48.815,1.864,1.864,0,0,0,2.063.7A486.048,486.048,0,0,0,610.7,405.729a1.882,1.882,0,0,0,.765-1.352C623.729,277.594,590.933,167.465,524.531,69.836ZM222.491,337.58c-28.972,0-52.844-26.587-52.844-59.239S193.056,219.1,222.491,219.1c29.665,0,53.306,26.82,52.843,59.239C275.334,310.993,251.924,337.58,222.491,337.58Zm195.38,0c-28.971,0-52.843-26.587-52.843-59.239S388.437,219.1,417.871,219.1c29.667,0,53.307,26.82,52.844,59.239C470.715,310.993,447.538,337.58,417.871,337.58Z"></path>
                    </svg>
                </div>
            </a>

            <a href="https://discord.gg/angelart" target="_blank" class="group relative rounded-full p-px  text-zinc-400 duration-300 hover:text-zinc-100 hover:shadow-glow-telegram " type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:Rvraqla:" data-state="closed">
                <span class="absolute inset-0 overflow-hidden rounded-full">
                    <span class="absolute inset-0 rounded-full bg-[image:radial-gradient(75%_100%_at_50%_0%,#31a9dd_0%,rgba(56,189,248,0)_75%)] opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                    </span>
                </span>
                <div class="relative z-10 rounded-full bg-zinc-950 px-4 py-1.5 ring-1 ring-white/10">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="2em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"></path>
                    </svg>
                </div>
            </a>
        </div>
        <p class="text-white text-center sora-normal mt-10 opacity-40"> <a href="https://discord.gg/angelart">Sellix template made with ❤️ by AngelArt</a></p>


    </footer>

    <script>
        function toggleSidebar() {
            // Check if the screen is smaller than the medium breakpoint where the burger icon is visible
            if (window.innerWidth < 768) {
                // Adjust 768px according to your Tailwind's md breakpoint
                const sidebar = document.getElementById("sidebar");
                sidebar.classList.toggle("translate-x-[-100%]");
                sidebar.classList.toggle("translate-x-0");
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const sidebarLinks = document.querySelectorAll("#sidebar a");
            sidebarLinks.forEach((link) => {
                link.addEventListener("click", function() {
                    if (window.innerWidth < 768) {
                        // This ensures that the function only triggers under your responsive condition
                        closeSidebar();
                    }
                });
            });
        });

        function closeSidebar() {
            const sidebar = document.getElementById("sidebar");
            if (sidebar.classList.contains("translate-x-0")) {
                sidebar.classList.remove("translate-x-0");
                sidebar.classList.add("translate-x-[-100%]");
            }
        }

        function showProducts(categoryId) {
            // Remove active classes from all buttons
            const categoryButtons = document.querySelectorAll('#category-buttons button');
            categoryButtons.forEach(button => {
                button.classList.remove('bg-white', 'text-black');
                button.classList.add('bg-darkViolet', 'text-white');
            });

            // Add active class to the clicked button
            const activeButton = Array.from(categoryButtons).find(button => button.getAttribute('onclick').includes(categoryId));
            if (activeButton) {
                activeButton.classList.add('bg-white', 'text-black');
                activeButton.classList.remove('bg-darkViolet', 'text-white');
            }

            // Show products of the selected category or all products if 'all' is selected
            const products = document.querySelectorAll('.product');
            products.forEach(product => {
                product.classList.add('hidden');
                if (categoryId === 'all') {
                    // Remove duplicates in "All" view
                    const seenProducts = new Set();
                    document.querySelectorAll('.product').forEach(p => {
                        const uniqid = p.getAttribute('data-title');
                        if (!seenProducts.has(uniqid)) {
                            seenProducts.add(uniqid);
                            p.classList.remove('hidden');
                        }
                    });
                } else if (product.getAttribute('data-category') === categoryId) {
                    product.classList.remove('hidden');
                }
            });
        }

        document.getElementById('search-input').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const activeCategory = document.querySelector('#category-buttons button.bg-white.text-black');
            const categoryId = activeCategory.getAttribute('onclick').match(/'(.*?)'/)[1];

            const allProducts = document.querySelectorAll('.product');

            // If in "All" category, use a Set to keep track of seen products
            if (categoryId === 'all') {
                const seenProducts = new Set();
                allProducts.forEach(product => {
                    const title = product.getAttribute('data-title');
                    if (title.includes(searchTerm) && !seenProducts.has(title)) {
                        product.classList.remove('hidden');
                        seenProducts.add(title);
                    } else {
                        product.classList.add('hidden');
                    }
                });
            } else {
                allProducts.forEach(product => {
                    const title = product.getAttribute('data-title');
                    const productCategory = product.getAttribute('data-category');

                    if (title.includes(searchTerm) && productCategory === categoryId) {
                        product.classList.remove('hidden');
                    } else {
                        product.classList.add('hidden');
                    }
                });
            }

            if (!searchTerm) {
                showProducts(categoryId);
            }
        });


        document.addEventListener("DOMContentLoaded", function() {
            showProducts('all'); // Initialize with 'All' category
        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>
</body>

</html>