import os
import re
import random

blog_dir = r"c:\Users\GCV\Desktop\Project\raj-hospital-php\blog"

links = {
    r"\b(heart attack|heart disease|cardiac|hypertension|blood pressure)\b": "/specialties/cardiology.php",
    r"\b(cancer|tumor|oncology|chemotherapy|breast cancer|lung cancer)\b": "/specialties/oncology-cancer-care.php",
    r"\b(pregnancy|pregnant|periods|pcod|pcos|maternity)\b": "/specialties/obstetrics-and-gynaecology.php",
    r"\b(joint pain|arthritis|bone|orthopedic|knee pain)\b": "/specialties/orthopaedics-and-joint-replacement.php",
    r"\b(anxiety|depression|mental health|stress|panic attack)\b": "/specialties/psychiatry-and-mental-health.php",
    r"\b(kidney stone|urine infection|uti|urology)\b": "/specialties/urology.php",
    r"\b(stomach pain|acidity|liver|gas|food poisoning|digestion)\b": "/specialties/gastroenterology.php",
    r"\b(diabetes|sugar|blood sugar|thyroid)\b": "/specialties/internal-medicine.php",
    r"\b(stroke|brain tumor|neurology|headache|migraine|paralysis)\b": "/specialties/neurology.php",
    r"\b(asthma|lungs infection|breathing|pulmonology)\b": "/specialties/pulmonology.php"
}

# Compile regexes (case insensitive)
compiled_links = {re.compile(k, re.IGNORECASE): v for k, v in links.items()}

def add_links_to_text(text, max_replacements=15):
    # We want to find matches outside of HTML tags.
    # A simple way is to split by HTML tags, modify only text parts, and rejoin.
    parts = re.split(r'(<[^>]+>)', text)
    
    replacements_made = 0
    used_targets = set()

    # Shuffle the regexes so we don't always replace the same first keyword
    regexes = list(compiled_links.items())
    random.shuffle(regexes)

    for i in range(len(parts)):
        if replacements_made >= max_replacements:
            break
            
        # Even indices are text outside tags, odd indices are HTML tags
        if i % 2 == 0:
            original_part = parts[i]
            if not original_part.strip():
                continue
                
            for regex, url in regexes:
                if replacements_made >= max_replacements:
                    break
                
                # Only link if the exact URL hasn't been linked too much (limit 2 per url per page)
                # To get 10+, we just need multiple different keywords.
                
                # Find all non-overlapping matches
                def replacer(match):
                    nonlocal replacements_made
                    if replacements_made < max_replacements:
                        replacements_made += 1
                        # Add a strong SEO friendly class
                        return f'<a href="{url}" class="text-red-600 hover:underline font-semibold">{match.group(0)}</a>'
                    return match.group(0)

                parts[i] = regex.sub(replacer, parts[i], count=1) # Replace 1 instance of this regex per text chunk

    return "".join(parts), replacements_made

count = 0
for filename in os.listdir(blog_dir):
    if filename.endswith(".php"):
        filepath = os.path.join(blog_dir, filename)
        with open(filepath, "r", encoding="utf-8", errors="ignore") as f:
            content = f.read()

        new_content, num_replaced = add_links_to_text(content, max_replacements=12)
        
        if num_replaced > 0:
            with open(filepath, "w", encoding="utf-8") as f:
                f.write(new_content)
            count += 1
            print(f"Updated {filename} with {num_replaced} links.")

print(f"Total files updated: {count}")
