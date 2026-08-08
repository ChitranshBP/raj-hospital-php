import os
import re

videos = {
    "gastroenterology.php": [
        {"id": "EXF9js8FIT8", "title": "क्या Hepatitis से Liver Failure हो सकता है?"},
        {"id": "PM9mcsMnAPc", "title": "Food is Medicine | खाना ही दवा है"},
        {"id": "rqEolJoBnvE", "title": "लिवर की सूजन: कारण, लक्षण और इलाज"}
    ],
    "cardiology.php": [
        {"id": "Qn2AtWqFZro", "title": "4.7 सेकंड के लिए रुक गया था दिल! | Pacemaker ने बचाई जान"},
        {"id": "NL9S7z4LJUY", "title": "Hypertension। Blood Pressure क्यों बढ़ जाता है"}
    ],
    "internal-medicine.php": [
        {"id": "DUazR7zK9j0", "title": "World Thyroid Day | थायरॉइड के शुरुआती लक्षण पहचानिए"}
    ],
    "oncology-cancer-care.php": [
        {"id": "PSeLDtNAwVU", "title": "World Ovarian Cancer Day"},
        {"id": "jjE2r36sxG0", "title": "महिलाओं में कैंसर का खतरा"},
        {"id": "g3mlIjk_JXw", "title": "फेफड़ों के कैंसर से बचाव"},
        {"id": "CrGn6vyRbRA", "title": "World Lung Cancer Day"}
    ],
    "haematology.php": [
        {"id": "mt7tbqhMjNw", "title": "World Thalassemia Day"}
    ],
    "urology.php": [
        {"id": "2SgBfniF4nY", "title": "छोटे Kidney Stone को बाहर कैसे निकले"},
        {"id": "zEN_ziZWeII", "title": "Urinary Tract Infection ( UTI )"},
        {"id": "olkjuMsFaHw", "title": "Varicocelectomy Surgery Explained"}
    ]
}

template_start = """
    <!-- Informative Videos Section -->
    <section class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12 fade-in">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Informative Videos</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Learn more about treatments and prevention from our specialists
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 fade-in">
"""

template_video = """
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/{id}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 line-clamp-2">{title}</h3>
                    </div>
                </div>
"""

template_end = """
            </div>
        </div>
    </section>
"""

base_dir = r"c:\Users\GCV\Desktop\Project\raj-hospital-php\specialties"

for filename, vids in videos.items():
    filepath = os.path.join(base_dir, filename)
    if os.path.exists(filepath):
        with open(filepath, "r", encoding="utf-8") as f:
            content = f.read()

        if "<!-- Informative Videos Section -->" in content:
            print(f"Skipping {filename}, already embedded.")
            continue

        html_to_insert = template_start
        for vid in vids:
            html_to_insert += template_video.format(id=vid["id"], title=vid["title"])
        html_to_insert += template_end + "\n"

        # Find where to insert (before <!-- FAQs and Contact Form Section -->)
        target = "<!-- FAQs and Contact Form Section -->"
        if target in content:
            new_content = content.replace(target, html_to_insert + "    " + target)
            with open(filepath, "w", encoding="utf-8") as f:
                f.write(new_content)
            print(f"Successfully updated {filename}")
        else:
            print(f"Target comment not found in {filename}")
    else:
        print(f"File {filename} not found.")
