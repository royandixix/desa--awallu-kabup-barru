<footer class="main-footer">
    <div class="footer-content">
        <div class="footer-copyright">
            © <?php echo e(date('Y')); ?> <strong>Sistem Admin Desa</strong>. All rights reserved.
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
        width: 100%;
    }

    .footer-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #64748b;
        font-size: 0.85rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .footer-copyright {
        flex: 1;
        min-width: 200px;
    }

    .footer-links {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .footer-links a {
        color: #64748b;
        text-decoration: none;
        transition: color 0.2s ease;
        white-space: nowrap;
    }

    .footer-links a:hover {
        color: #1e293b;
    }

    /* Tablet */
    @media (max-width: 768px) {
        .main-footer {
            padding: 1.25rem 1.5rem;
        }

        .footer-content {
            justify-content: center;
        }

        .footer-copyright {
            text-align: center;
            width: 100%;
        }

        .footer-links {
            justify-content: center;
            width: 100%;
        }
    }

    /* Mobile */
    @media (max-width: 576px) {
        .main-footer {
            padding: 1rem;
        }

        .footer-content {
            font-size: 0.8rem;
        }

        .footer-links {
            gap: 1rem;
        }
    }
</style><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/partials/footer.blade.php ENDPATH**/ ?>