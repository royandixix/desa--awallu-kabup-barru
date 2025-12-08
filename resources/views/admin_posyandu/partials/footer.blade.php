<footer class="main-footer">
    <div class="footer-content">
        <div class="footer-left">
            © {{ date('Y') }} <strong>Admin Posyandu</strong>. All rights reserved.
        </div>
        <div class="footer-right">
            <a href="#">Bantuan</a>
            <a href="#">Dokumentasi</a>
            <a href="#">Kontak</a>
        </div>
    </div>
</footer>

<style>
    .main-footer {
        background: #e8f5e9;
        border-top: 1px solid #c8e6c9;
        padding: 1.5rem 2rem;
        margin-top: auto;
        width: 100%;
        font-family: 'Inter', sans-serif;
    }

    .footer-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #2e7d32;
        font-size: 0.85rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .footer-left {
        flex: 1;
        min-width: 200px;
    }

    .footer-right {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .footer-right a {
        color: #2e7d32;
        text-decoration: none;
        transition: color 0.2s ease;
        white-space: nowrap;
        font-weight: 500;
    }

    .footer-right a:hover {
        color: #1b5e20;
    }

    @media (max-width: 768px) {
        .main-footer {
            padding: 1.25rem 1.5rem;
        }

        .footer-content {
            justify-content: center;
        }

        .footer-left {
            text-align: center;
            width: 100%;
        }

        .footer-right {
            justify-content: center;
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .main-footer {
            padding: 1rem;
        }

        .footer-content {
            font-size: 0.8rem;
        }

        .footer-right {
            gap: 1rem;
        }
    }
</style>