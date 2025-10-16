{{-- Modal Transaksi Berhasil --}}
<div class="modal fade" id="modalSukses" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center p-4">
            {{-- Icon Success SweetAlert2 dengan animasi --}}
            <div class="swal2-icon swal2-success swal2-animate-success-icon mb-3" style="display: flex; width: 80px; height: 80px; margin: 0 auto;">
                <div class="swal2-success-circular-line-left" style="background-color: transparent;"></div>
                <span class="swal2-success-line-tip swal2-animate-success-line-tip"></span>
                <span class="swal2-success-line-long swal2-animate-success-line-long"></span>
                <div class="swal2-success-ring"></div>
                <div class="swal2-success-fix" style="background-color: transparent;"></div>
                <div class="swal2-success-circular-line-right" style="background-color: transparent;"></div>
            </div>

            <h5 class="text-success mb-2">Transaksi Berhasil</h5>
            <p id="kodeTransaksi" class="fw-bold text-dark mb-3"></p>

            <div class="d-flex justify-content-center gap-3">
                <button class="btn btn-secondary" id="btnTidakCetak">Tidak Cetak</button>
                <button class="btn btn-success" id="btnCetak">Cetak</button>
            </div>
        </div>
    </div>
</div>

<style>
/* Style untuk icon SweetAlert2 yang disesuaikan */
.swal2-icon {
    position: relative;
    box-sizing: content-box;
    justify-content: center;
    width: 80px;
    height: 80px;
    margin: 0 auto;
    border: 4px solid #a5dc86;
    border-radius: 50%;
    font-family: inherit;
    line-height: 80px;
    cursor: default;
    user-select: none;
}

.swal2-success-line-tip {
    top: 46px;
    left: 14px;
    width: 25px;
    transform: rotate(45deg);
}

.swal2-success-line-long {
    top: 38px;
    right: 8px;
    width: 47px;
    transform: rotate(-45deg);
}

.swal2-success-line-tip,
.swal2-success-line-long {
    background-color: #a5dc86;
    height: 5px;
    display: block;
    border-radius: 2px;
    position: absolute;
    z-index: 2;
}

.swal2-success-ring {
    position: absolute;
    z-index: 1;
    top: -4px;
    left: -4px;
    box-sizing: content-box;
    width: 100%;
    height: 100%;
    border: 4px solid rgba(165, 220, 134, 0.3);
    border-radius: 50%;
}

.swal2-animate-success-line-tip {
    animation: swal2-animate-success-line-tip 0.75s;
}

.swal2-animate-success-line-long {
    animation: swal2-animate-success-line-long 0.75s;
}

@keyframes swal2-animate-success-line-tip {
    0% { top: 19px; left: 1px; width: 0; }
    54% { top: 17px; left: 2px; width: 0; }
    70% { top: 35px; left: -6px; width: 50px; }
    84% { top: 48px; left: 21px; width: 17px; }
    100% { top: 46px; left: 14px; width: 25px; }
}

@keyframes swal2-animate-success-line-long {
    0% { top: 54px; right: 46px; width: 0; }
    65% { top: 54px; right: 46px; width: 0; }
    84% { top: 35px; right: 0; width: 55px; }
    100% { top: 38px; right: 8px; width: 47px; }
}
</style>
