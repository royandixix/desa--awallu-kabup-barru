// Menggunakan DOMContentLoaded untuk memastikan semua elemen HTML (termasuk navbar)
// sudah tersedia sebelum script mencoba berinteraksi dengannya.
document.addEventListener('DOMContentLoaded', () => {

    // ========== ELEMENT SELECTION ==========
    const toggleBtn = document.getElementById('mobile-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const dropdownBtnsMobile = document.querySelectorAll('#mobile-menu .dropdown-btn');
    const dropdownBtnsDesktop = document.querySelectorAll('.dropdown-btn-desktop');
    const navbar = document.getElementById('navbar');

    // Cek apakah elemen navbar utama ditemukan. Jika tidak, hentikan script.
    if (!toggleBtn || !mobileMenu || !menuIcon) {
        console.warn("Navbar Mobile Error: Elemen 'mobile-toggle' atau 'mobile-menu' tidak ditemukan di DOM. Periksa ID.");
        return; 
    }

    // Fungsi untuk memperbarui tinggi menu mobile utama setelah dropdown diubah
    const updateMobileMenuHeight = () => {
        if (mobileMenu.style.maxHeight !== '0px' && mobileMenu.style.maxHeight !== '') {
            // Atur ke 'auto' dan kembali untuk menghitung tinggi secara akurat, mengatasi bug scrollHeight
            mobileMenu.style.maxHeight = 'auto'; 
            const accurateHeight = mobileMenu.scrollHeight;
            mobileMenu.style.maxHeight = accurateHeight + 'px'; 
        }
    };

    // ========== 1. MOBILE MENU TOGGLE (Hamburger Button) ==========
    toggleBtn.addEventListener('click', () => {
        const isClosed = mobileMenu.style.maxHeight === '0px' || mobileMenu.style.maxHeight === '';
        
        if (isClosed) {
            // Buka: Set tinggi ke scrollHeight penuh
            mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
            menuIcon.classList.remove('bi-list');
            menuIcon.classList.add('bi-x-lg');
        } else {
            // Tutup: Set tinggi ke 0
            mobileMenu.style.maxHeight = '0px';
            menuIcon.classList.remove('bi-x-lg');
            menuIcon.classList.add('bi-list');
        }
    });

    // ========== 2. MOBILE DROPDOWN (Inside Mobile Menu) ==========
    dropdownBtnsMobile.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const content = btn.nextElementSibling;
            const isOpen = content.style.maxHeight && content.style.maxHeight !== '0px';
            
            // Tutup semua dropdown lain (untuk satu kali buka)
            dropdownBtnsMobile.forEach(otherBtn => {
                const otherContent = otherBtn.nextElementSibling;
                if (otherContent !== content && otherContent && otherContent.style.maxHeight !== '0px') {
                     otherContent.style.maxHeight = '0px';
                     otherBtn.classList.remove('active');
                }
            });

            // Toggle dropdown yang diklik
            if (isOpen) {
                content.style.maxHeight = '0px';
                btn.classList.remove('active');
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
                btn.classList.add('active');
            }
            
            // PENTING: Update tinggi menu mobile utama setelah transisi selesai
            setTimeout(updateMobileMenuHeight, 350); 
        });
    });

    // ========== 3. DESKTOP DROPDOWN ==========
    dropdownBtnsDesktop.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const content = btn.nextElementSibling;
            
            document.querySelectorAll('.dropdown-content-desktop').forEach(c => {
                c.classList.remove('show');
            });
            
            if (!content.classList.contains('show')) {
                content.classList.add('show');
            }
        });
    });

    // Tutup dropdown desktop saat klik di luar
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.dropdown-wrapper')) {
            document.querySelectorAll('.dropdown-content-desktop').forEach(c => {
                c.classList.remove('show');
            });
        }
    });

    // ========== 4. NAVBAR SCROLL EFFECT ==========
    window.addEventListener('scroll', () => {
        if (navbar) {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-teal-900/70', 'backdrop-blur-xl', 'shadow-lg');
            } else {
                navbar.classList.remove('bg-teal-900/70', 'backdrop-blur-xl', 'shadow-lg');
            }
        }
    });

    // ========== 5. CLOSE MOBILE MENU ON LINK CLICK ==========
    document.querySelectorAll('#mobile-menu a').forEach(link => {
        link.addEventListener('click', () => {
            if (mobileMenu && menuIcon) {
                mobileMenu.style.maxHeight = '0px';
                menuIcon.classList.remove('bi-x-lg');
                menuIcon.classList.add('bi-list');
            }
        });
    });
});