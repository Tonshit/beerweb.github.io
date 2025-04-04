<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Craft Beer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="frontcover.css"> <!-- Link to the external CSS file -->
</head>
<body class="bg-black text-white">
<header class="bg-black text-white py-4">
    <div class="container mx-auto flex justify-between items-center px-4 max-w-6xl">
        <nav class="flex space-x-4">
            <a class="text-white hover:text-yellow-500" href="index.php">HOME</a>
            <a class="text-white hover:text-yellow-500" href="beer.html">BEERS</a>
            <a class="text-white hover:text-yellow-500" href="about.html">ABOUT</a>
            <a class="text-white hover:text-yellow-500" href="cart.html">CART</a>
        </nav>
        <div class="text-center">
            <img alt="Brew logo" class="mx-auto rounded-full" height="100" src="https://static.vecteezy.com/system/resources/previews/007/306/850/non_2x/beer-glasses-hand-drawn-illustration-cheers-lettering-phrase-cartoon-style-design-for-logo-banner-poster-greeting-cards-web-invitation-to-party-vector.jpg" width="100"/>
            <h1 class="text-2xl font-bold">BREW</h1>
            <p class="text-yellow-500">PREMIUM QUALITY</p>
        </div>
        <nav class="flex space-x-4">
            <a class="text-white hover:text-yellow-500" href="event.html">EVENTS</a>
            <a class="text-white hover:text-yellow-500" href="https://beerandbrewing.com/category/Beer%20News/1/">NEWS</a>
            <a class="text-white hover:text-yellow-500" href="https://www.istockphoto.com/photos/drinking-beer">GALLERY</a>
            <a class="text-white hover:text-yellow-500" href="contact.html">CONTACT</a>
        </nav>
    </div>
</header>
<main class="relative">
    <img alt="Background image of a beer barrel and glasses of beer" class="w-full h-screen object-cover" height="1080" src="https://media2.giphy.com/media/31UAfj25RL6nvarVeK/giphy.gif?cid=6c09b9523pmw8pa1w46n4689obr14lujmz4bo39onf0b3gbe&ep=v1_internal_gif_by_id&rid=giphy.gif&ct=g" width="1920"/>
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center px-4">
        <h2 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-4 glow-text">CRAFT BEER</h2>
        <div class="border-t-4 border-yellow-500 w-24 mb-4"></div>
        <div class="scroll-container">
            <p class="text-sm md:text-lg lg:text-xl mb-8">
                Welcome to the world of beer, a beloved beverage enjoyed for thousands of years across cultures. From crisp lagers to rich stouts, beer offers a diverse array of flavors and aromas that cater to every palate. Crafted from water, malt, hops, and yeast, each brew reflects the traditions and innovations of its makers. Whether you're savoring a pint at a local pub or sharing a cold one with friends, beer invites connection and celebration. Join us as we explore the fascinating history and vibrant community surrounding this timeless drink. Cheers!
            </p>
        </div>
        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
            <a href="https://www.craftbeer.com/beer/what-is-craft-beer" class="border-2 border-yellow-500 text-yellow-500 px-4 py-2 text-center inline-block">Learn More</a>
            <a href="beer.html" class="border-2 border-yellow-500 text-yellow-500 px-4 py-2 text-center inline-block">Our Beers</a>
        </div>
        <div class="absolute bottom-4">
            <i class="fas fa-chevron-down text-white text-2xl"></i>
        </div>
    </div>
    
    <!-- Contact Form Section -->
    <div class="container mx-auto px-4 max-w-6xl mt-10">
        <h2 class="text-3xl font-bold mb-4">Contact Us</h2>
        <form action="process_contact.php" method="POST" class="bg-gray-800 p-6 rounded-lg">
            <div class="mb-4">
                <label for="name" class="block text-sm font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" required class="w-full p-2 border border-gray-600 rounded"/>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-600 rounded"/>
            </div>
            <div class="mb-4">
 <label for="message" class="block text-sm font-bold mb-2">Message:</label>
                <textarea id="message" name="message" required class="w-full p-2 border border-gray-600 rounded" rows="4"></textarea>
            </div>
            <button type="submit" class="bg-yellow-500 text-black px-4 py-2 rounded">Send Message</button>
        </form>
    </div>
</main>
</body>
</html>