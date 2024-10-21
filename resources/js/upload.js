import { createClient } from '@supabase/supabase-js';
import { v4 as uuidv4 } from 'uuid';
const supabaseUrl = 'https://nxualfcbfpboaeoksbdg.supabase.co';
const supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im54dWFsZmNiZnBib2Flb2tzYmRnIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MjY5NzkxMzIsImV4cCI6MjA0MjU1NTEzMn0.LMtFO1D9rU3_BaaWUKDVQGek7hUC02KBktmcnRnxZmw';
const supabase = createClient(supabaseUrl, supabaseKey);


const fileInput = document.getElementById('fileInput');
const uploadButton = document.getElementById('uploadButton');
const imagePreview = document.getElementById('imagePreview');

uploadButton.addEventListener('click', async () => {
    const file = fileInput.files[0];
    if (!file) {
        console.error('No file selected');
        return;
    }

    const fileName = `${uuid.v4()}.jpg`;
    const { data, error } = await supabase.storage.from('images').upload(fileName, file);

    if (error) {
        console.error('Error uploading image:', error.message);
    } else {
        console.log('Image uploaded successfully:', data);
        // Mendapatkan URL publik gambar
        const { publicURL, error: urlError } = supabase.storage.from('images').getPublicUrl(fileName);
        if (urlError) {
            console.error('Error fetching public URL:', urlError.message);
        } else {
            // Tampilkan preview gambar
            imagePreview.src = publicURL;
            imagePreview.style.display = 'block';
        }
    }
});