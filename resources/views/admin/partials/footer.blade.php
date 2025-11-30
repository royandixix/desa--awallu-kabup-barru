<footer class="main-footer">
    <div class="footer-content">
        <div>
            © {{ date('Y') }} <strong>Sistem Admin Desa</strong>. All rights reserved.
        </div>
        <div class="footer-links">
            <a href="#">Bantuan</a>
            <a href="#">Dokumentasi</a>
            <a href="#">Kontak</a>
        </div>
    </div>
</footer>

<style>
    /* ========== FOOTER STYLES ========== */
    .main-footer {
        background: #fff;
        border-top: 1px solid #e2e8f0;
        padding: 1.5rem 2rem;
        margin-top: auto;
    }

    .footer-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #64748b;
        font-size: 0.85rem;
    }

    .footer-links {
        display: flex;
        gap: 1.5rem;
    }

    .footer-links a {
        color: #64748b;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .footer-links a:hover {
        color: #1e293b;
    }

    @media (max-width: 991.98px) {
        .main-footer {
            padding: 1.5rem;
        }

        .footer-content {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
    }
</style>