<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $name ?? 'Freelancer Profile' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="max-w-8xl mx-auto px-6 py-10">

        <!-- Header Section -->
        <div class="flex flex-col md:flex-row items-center gap-6 bg-white p-6 rounded-2xl shadow-md">
            <img class="w-32 h-32 rounded-full object-cover ring-4 ring-green-500" src="{{ $avatar ?? 'https://via.placeholder.com/150' }}" alt="Profile Picture" />
            <div class="flex-1">
                <h1 class="text-3xl font-bold inline">{{ $user->name ?? 'Mohamed Elkhanfaf' }}</h1>
<p class="text-lg text-gray-400 mt-1 inline ml-2">{{ '@' . ($user->username ?? 'edo_thecreator') }}</p>

                
<div class="flex items-center">
    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
    </svg>
    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
    </svg>
    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
    </svg>
    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
    </svg>
    <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
    </svg>
    <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">4.95</p>
    <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">out of</p>
    <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">5</p>
</div>

                <p class="text-gray-600 text-lg">{{ $tagline ?? 'Laravel Developer | Web Apps & APIs' }}</p>
                <p class="text-sm text-gray-400 mt-1">Member since {{ $user->created_at->format('l, F j, Y \a\t g:i A') }}</p>

                
                <div class="mt-3 flex gap-3">
                    @foreach ($socials ?? ['twitter' => '#', 'linkedin' => '#'] as $platform => $link)
                        <a href="{{ $link }}" class="text-blue-600 text-sm hover:underline capitalize">{{ $platform }}</a>
                    @endforeach
                </div>
            </div>
            <a href="#contact" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg shadow text-sm font-semibold">Contact</a>
        </div>

       <!-- About Section -->
<div class="mt-8 bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-xl font-semibold mb-2">About Me</h2>
    <!-- Hidden Text with Line Clamping -->
    <p id="aboutText" class="text-gray-700 line-clamp-3">
        {{ $about ?? 'Experienced developer with a strong focus on Laravel and Tailwind CSS. I build scalable, maintainable, and beautiful web apps. With over 5 years of experience, I have worked on numerous web projects, creating custom solutions and optimizing performance. I’m passionate about clean, readable code and strive to follow the best industry practices. My skills include frontend technologies like HTML, CSS, JavaScript, and React, alongside backend technologies such as PHP, Laravel, and MySQL. I thrive in collaborative environments and always look forward to learning new things to improve my skills and deliver high-quality solutions.' }}
    </p>
    <!-- Read More Button -->
    <button id="readMoreButton" class="text-blue-600 font-medium mt-2 hidden">
        Read More
    </button>
</div>

<!-- JavaScript for Read More/Hide -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var aboutText = document.getElementById("aboutText");
        var button = document.getElementById("readMoreButton");

        // Check if the content of the paragraph exceeds the 3 lines
        var textHeight = aboutText.scrollHeight;
        var containerHeight = aboutText.clientHeight;

        // If the text is long enough to require a Read More button, show it
        if (textHeight > containerHeight) {
            button.classList.remove("hidden");

            button.addEventListener("click", function() {
                // Toggle between showing full text or clamped text
                if (aboutText.classList.contains("line-clamp-3")) {
                    aboutText.classList.remove("line-clamp-3");
                    button.textContent = "Read Less";
                } else {
                    aboutText.classList.add("line-clamp-3");
                    button.textContent = "Read More";
                }
            });
        }
    });
</script>



   

            <!-- Skills and Languages Container (Grid Layout) -->
<div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
    
    <!-- Skills Section -->
    <div class="bg-white p-6 rounded-2xl shadow-lg">
        <h3 class="text-lg font-semibold mb-3 text-gray-800">Skills</h3>
        <div class="flex flex-wrap gap-4">
            @foreach ($user->skills ?? [] as $skill)
                <span class="bg-gradient-to-r from-blue-500 to-teal-500 text-white px-4 py-2 rounded-full text-sm font-medium transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:bg-gradient-to-r hover:from-teal-500 hover:to-blue-500 cursor-pointer">
                    {{ $skill->level }} in {{ $skill->name }}
                </span>
            @endforeach
        </div>
    </div>

    <!-- Languages Section -->
    <!-- Languages Section -->
<div class="bg-white p-6 rounded-2xl shadow-md">
    <h3 class="text-lg font-semibold mb-3">Languages</h3>
    <ul class="list-disc list-inside space-y-4 text-gray-700">
        @foreach ($user->languages as $lang)
            <li class="flex items-center space-x-4">
                <!-- Language Name -->
                <span class="font-medium text-gray-800">{{ $lang->name }}</span>

                <!-- Progress Bar -->
                <div class="flex-grow bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                    <div class="h-2.5 rounded-full"
                         style="width: {{ $lang->percentage }}%; background-color: 
                            {{ 
                                $lang->level == 'Native' ? '#2f855a' : 
                                ($lang->level == 'Fluent' ? '#3182ce' : '#e4a639') 
                            }}">
                    </div>
                </div>

                <!-- Level Display to the Right -->
                <span class="text-sm font-medium text-gray-500">{{ $lang->level }}</span>
            </li>
        @endforeach
    </ul>
</div>

</div>



       <!-- Services -->
<div class="mt-8 bg-white p-6 rounded-2xl shadow-md">
    <h3 class="text-xl font-semibold mb-4">Services</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Service 1 -->
        <a href="https://www.randomlink.com" class="cursor-pointer">
            <div class="border rounded-lg p-4 hover:shadow-md transition flex flex-col h-full">
                <div class="mb-4">
                    <img src="https://via.placeholder.com/300x200" alt="Shopify Setup" class="w-full h-48 object-cover rounded-md">
                </div>
                <h4 class="font-bold text-gray-900">Shopify Store Setup</h4>
                <p class="text-sm text-gray-600 mt-1 flex-grow">I will set up and customize your Shopify store to suit your business needs and help you launch your online store quickly.</p>
                <div class="mt-2 flex justify-between text-sm text-gray-700">
                    <span class="font-semibold text-green-600">À partir de 175 $US</span>
                    <span id="service1-time" class="service-time">Posted today</span>
                </div>
            </div>
        </a>

        <!-- Service 2 -->
        <a href="https://www.randomlink2.com" class="cursor-pointer">
            <div class="border rounded-lg p-4 hover:shadow-md transition flex flex-col h-full">
                <div class="mb-4">
                    <img src="https://via.placeholder.com/300x200" alt="E-commerce Solutions" class="w-full h-48 object-cover rounded-md">
                </div>
                <h4 class="font-bold text-gray-900">E-commerce Solutions</h4>
                <p class="text-sm text-gray-600 mt-1 flex-grow">Customized e-commerce solutions using Shopify and WooCommerce for a seamless online store experience.</p>
                <div class="mt-2 flex justify-between text-sm text-gray-700">
                    <span class="font-semibold text-green-600">À partir de 200 $US</span>
                    <span id="service2-time" class="service-time">Posted 2 days ago</span>
                </div>
            </div>
        </a>

        <!-- Service 3 -->
        <a href="https://www.randomlink3.com" class="cursor-pointer">
            <div class="border rounded-lg p-4 hover:shadow-md transition flex flex-col h-full">
                <div class="mb-4">
                    <img src="https://via.placeholder.com/300x200" alt="SEO Optimization" class="w-full h-48 object-cover rounded-md">
                </div>
                <h4 class="font-bold text-gray-900">SEO Optimization</h4>
                <p class="text-sm text-gray-600 mt-1 flex-grow">Boost your online visibility and improve your website’s ranking with tailored SEO optimization strategies.</p>
                <div class="mt-2 flex justify-between text-sm text-gray-700">
                    <span class="font-semibold text-green-600">À partir de 150 $US</span>
                    <span id="service3-time" class="service-time">Posted 1 week ago</span>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- JavaScript to dynamically calculate and display relative time -->
<script>
    // Function to get relative time (like 'posted today', '2 days ago', etc.)
    function getRelativeTime(publishedDate) {
        const now = new Date();
        const diffInSeconds = Math.floor((now - new Date(publishedDate)) / 1000);
        const diffInMinutes = Math.floor(diffInSeconds / 60);
        const diffInHours = Math.floor(diffInMinutes / 60);
        const diffInDays = Math.floor(diffInHours / 24);
        const diffInWeeks = Math.floor(diffInDays / 7);

        if (diffInDays < 1) {
            return 'Posted today';
        } else if (diffInDays === 1) {
            return 'Posted yesterday';
        } else if (diffInDays < 7) {
            return ${diffInDays} days ago;
        } else if (diffInWeeks < 4) {
            return ${diffInWeeks} week${diffInWeeks > 1 ? 's' : ''} ago;
        } else {
            return ${Math.floor(diffInWeeks / 4)} month${Math.floor(diffInWeeks / 4) > 1 ? 's' : ''} ago;
        }
    }

    // Example: Assign relative time to each service
    document.getElementById("service1-time").innerText = getRelativeTime('2025-05-14'); // example date (2025-05-14)
    document.getElementById("service2-time").innerText = getRelativeTime('2025-05-12'); // example date (2025-05-12)
    document.getElementById("service3-time").innerText = getRelativeTime('2025-04-28'); // example date (2025-04-28)
</script>


        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mt-8">
  <!-- Main Project Display -->
  <div id="main-project" class="lg:col-span-3 bg-white rounded-2xl shadow-md flex flex-col lg:flex-row min-h-[620px]">
    <!-- Thumbnail on the left -->
    <div class="lg:w-1/2 w-full h-full bg-gray-200 rounded-l-2xl flex items-center justify-center overflow-hidden">
      <img src="https://via.placeholder.com/400x500" alt="Project Thumbnail" class="object-cover w-full h-full">
    </div>

    <!-- Project Details -->
    <div class="p-6 lg:w-1/2 w-full flex flex-col justify-between">
      <div>
        <h3 id="main-project-title" class="text-xl font-bold mb-1">Friendly Hoobies | Toy Store</h3>
        <p class="text-sm text-gray-500 mb-2">From: July 2023</p>
        <p class="text-gray-700 text-sm mb-4">
          I completed this project for a USA-based toy store. It’s a dynamic e-commerce platform with remote-controlled toys for both children and adults. The platform integrates payment gateways, is mobile-optimized, and has detailed product descriptions, customer reviews, and advanced search.
        </p>
      </div>
      <div class="flex justify-between text-base text-gray-700 mt-auto pt-4">
        <div>
          <p class="text-sm text-gray-600">Project Cost</p>
          <p class="text-xl font-bold">$400-$600</p>
        </div>
        <div class="text-right">
          <p class="text-sm text-gray-600">Project Duration</p>
          <p class="text-xl font-bold">1 to 7 days</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Project List -->
  <div class="space-y-4">
    <button onclick="loadProject('friendly', this)" class="block w-full text-left p-4 rounded-lg border bg-white shadow hover:bg-gray-100 transition">
      <h4 class="font-semibold text-sm">Friendly Hoobies | Toy Store</h4>
      <p class="text-xs text-gray-500">745 Reviews</p>
    </button>

    <button onclick="loadProject('peek', this)" class="block w-full text-left p-4 rounded-lg border bg-white shadow hover:bg-gray-100 transition">
      <h4 class="font-semibold text-sm">Peek A Boo | Baby Clothing</h4>
      <p class="text-xs text-gray-500">+3 Projects</p>
    </button>
  </div>
</div>

<script>
  const originalProjectHTML = document.getElementById('main-project').innerHTML;

  function loadProject(id, el) {
    const container = document.getElementById('main-project');

    if (id === 'friendly') {
      container.innerHTML = originalProjectHTML;
      return;
    }

    let content = '';

    if (id === 'peek') {
      content = `
        <div class="lg:col-span-3 bg-white rounded-2xl shadow-md flex flex-col lg:flex-row min-h-[620px]">
          <!-- Thumbnail -->
          <div class="lg:w-1/2 w-full h-full bg-gray-200 rounded-l-2xl flex items-center justify-center overflow-hidden">
            <img src="https://via.placeholder.com/400x500" alt="Peek Thumbnail" class="object-cover w-full h-full">
          </div>

          <!-- Details -->
          <div class="p-6 lg:w-1/2 w-full flex flex-col justify-between">
            <div>
              <h3 id="main-project-title" class="text-xl font-bold mb-1">Peek A Boo | Baby Clothing</h3>
              <p class="text-sm text-gray-500 mb-2">From: May 2023</p>
              <p class="text-gray-700 text-sm mb-4">
                Completed for a boutique baby apparel brand, this Shopify store includes customized themes, secure checkout, and full responsiveness.
              </p>
            </div>
            <div class="flex justify-between text-base text-gray-700 mt-auto pt-4">
              <div>
                <p class="text-sm text-gray-600">Project Cost</p>
                <p class="text-xl font-bold">$300-$450</p>
              </div>
              <div class="text-right">
                <p class="text-sm text-gray-600">Project Duration</p>
                <p class="text-xl font-bold">2 to 5 days</p>
              </div>
            </div>
          </div>
        </div>
      `;
    }

    container.innerHTML = content;
  }
</script>

        <div class="mt-8 bg-white p-6 rounded-2xl shadow-md">
  <h3 class="text-xl font-semibold mb-6 text-gray-900">Reviews</h3>

  <!-- Review Summary -->
  <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Left Half -->
    <div>
      <div class="flex items-center mb-2">
        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
          <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
        </svg>
        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
          <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
        </svg>
        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
          <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
        </svg>
        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
          <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
        </svg>
        <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
          <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
        </svg>
        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">4.95</p>
        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">out of</p>
        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">5</p>
      </div>
      <p class="text-sm font-medium text-gray-500 dark:text-gray-400">1,745 global ratings</p>
      <div class="space-y-4 mt-4">
        <div class="flex items-center">
          <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">5 star</a>
          <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded-sm dark:bg-gray-700">
            <div class="h-5 bg-yellow-300 rounded-sm" style="width: 70%"></div>
          </div>
          <span class="text-sm font-medium text-gray-500 dark:text-gray-400">70%</span>
        </div>
        <div class="flex items-center">
          <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">4 star</a>
          <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded-sm dark:bg-gray-700">
            <div class="h-5 bg-yellow-300 rounded-sm" style="width: 17%"></div>
          </div>
          <span class="text-sm font-medium text-gray-500 dark:text-gray-400">17%</span>
        </div>
        <div class="flex items-center">
          <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">3 star</a>
          <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded-sm dark:bg-gray-700">
            <div class="h-5 bg-yellow-300 rounded-sm" style="width: 8%"></div>
          </div>
          <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8%</span>
        </div>
        <div class="flex items-center">
          <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">2 star</a>
          <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded-sm dark:bg-gray-700">
            <div class="h-5 bg-yellow-300 rounded-sm" style="width: 4%"></div>
          </div>
          <span class="text-sm font-medium text-gray-500 dark:text-gray-400">4%</span>
        </div>
        <div class="flex items-center">
          <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">1 star</a>
          <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded-sm dark:bg-gray-700">
            <div class="h-5 bg-yellow-300 rounded-sm" style="width: 1%"></div>
          </div>
          <span class="text-sm font-medium text-gray-500 dark:text-gray-400">1%</span>
        </div>
      </div>
    </div>

    <!-- Right Half -->
    <div class="grid grid-cols-1 gap-4">
      <h4 class="text-md font-semibold text-gray-800 mb-2">Rating Details</h4>
      <dl>
        <dt class="text-sm font-medium text-gray-500">Communication level</dt>
        <dd class="flex items-center mb-3">
          <div class="w-full bg-gray-200 rounded-sm h-2.5 me-2">
            <div class="bg-blue-600 h-2.5 rounded-sm" style="width: 100%"></div>
          </div>
          <span class="text-sm font-medium text-gray-500">5</span>
        </dd>
      </dl>
      <dl>
        <dt class="text-sm font-medium text-gray-500">Delivery quality</dt>
        <dd class="flex items-center mb-3">
          <div class="w-full bg-gray-200 rounded-sm h-2.5 me-2">
            <div class="bg-blue-600 h-2.5 rounded-sm" style="width: 98%"></div>
          </div>
          <span class="text-sm font-medium text-gray-500">4.9</span>
        </dd>
      </dl>
      <dl>
        <dt class="text-sm font-medium text-gray-500">Value for money</dt>
        <dd class="flex items-center">
          <div class="w-full bg-gray-200 rounded-sm h-2.5 me-2">
            <div class="bg-blue-600 h-2.5 rounded-sm" style="width: 98%"></div>
          </div>
          <span class="text-sm font-medium text-gray-500">4.9</span>
        </dd>
      </dl>
    </div>
  </div>

  <!-- Individual Reviews -->
  <div class="space-y-6">
    <!-- Reviews unchanged -->
    <div class="flex flex-col p-6 rounded-2xl bg-gray-50 shadow-md hover:shadow-lg transition duration-300 ease-in-out">
      <div class="flex justify-between items-start mb-4">
        <p class="text-gray-700 text-sm italic">“The website I received is absolutely amazing. It’s user-friendly, fast, and beautifully designed. I couldn't be happier with the results!”</p>
      </div>
      <div class="flex justify-between items-center text-sm">
        <span class="text-yellow-500 text-lg">★★★★★</span>
        <span class="text-gray-500">– John Doe</span>
      </div>
      <div class="flex items-center mt-4">
        <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center mr-4">
          <img src="https://via.placeholder.com/150" alt="Author Image" class="object-cover w-full h-full rounded-full">
        </div>
        <div class="flex flex-col">
          <span class="text-gray-700 font-semibold">John Doe</span>
          <span class="text-gray-500 text-xs">Customer</span>
        </div>
      </div>
    </div>
  </div>
</div>

        <!-- Contact -->
        <div id="contact" class="mt-10 bg-white p-6 rounded-2xl shadow-md text-center">
            <h3 class="text-xl font-semibold mb-2">Get in Touch</h3>
            <p class="text-sm text-gray-600 mb-4">Send me a message to discuss your project or ask a question.</p>
            <a href="mailto:freelancer@example.com" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">Contact Now</a>
        </div>

    </div>

</body>
</html>