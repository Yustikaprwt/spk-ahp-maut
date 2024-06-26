{{-- SUBKRITERIA LOKASI PENGGUNA 2--}}

{{-- DEKAT DENGAN KAMPUS & DEKAT DENGAN LAYANAN PUBLIK USER 1 (C3A-C3B-U2) --}}
<div class="input-group-1">
    <label>Dekat dengan Kampus</label>
        <div class="slider-container1">
            <span class="slider-mark-1 mark-9-1"></span>
            <span class="slider-mark-1 mark-8-1"></span>
            <span class="slider-mark-1 mark-7-1"></span>
            <span class="slider-mark-1 mark-6-1"></span>
            <span class="slider-mark-1 mark-5-1"></span>
            <span class="slider-mark-1 mark-4-1"></span>
            <span class="slider-mark-1 mark-3-1"></span>
            <span class="slider-mark-1 mark-2-1"></span>
            <span class="slider-mark-1 mark-1-1"></span>
            <span class="slider-mark-1 mark-0_50-1"></span>
            <span class="slider-mark-1 mark-0_33-1"></span>
            <span class="slider-mark-1 mark-0_25-1"></span>
            <span class="slider-mark-1 mark-0_20-1"></span>
            <span class="slider-mark-1 mark-0_16-1"></span>
            <span class="slider-mark-1 mark-0_14-1"></span>
            <span class="slider-mark-1 mark-0_12-1"></span>
            <span class="slider-mark-1 mark-0_11-1"></span>
    
            <input 
                type="range" 
                id="slider18u2" 
                name="C3A-C3B-U2"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue18u2(this.value)">
            <span class="value-label" id="sliderValue18u2">1</span>
            <div class="slider-tooltip-1" id="sliderTooltip18u2">1</div>

            <span class="slider-label-1 mark-9-1">9</span>
            <span class="slider-label-1 mark-8-1">8</span>
            <span class="slider-label-1 mark-7-1">7</span>
            <span class="slider-label-1 mark-6-1">6</span>
            <span class="slider-label-1 mark-5-1">5</span>
            <span class="slider-label-1 mark-4-1">4</span>
            <span class="slider-label-1 mark-3-1">3</span>
            <span class="slider-label-1 mark-2-1">2</span>
            <span class="slider-label-1 mark-1-1">1</span>
            <span class="slider-label-1 mark-0_50-1">2</span>
            <span class="slider-label-1 mark-0_33-1">3</span>
            <span class="slider-label-1 mark-0_25-1">4</span>
            <span class="slider-label-1 mark-0_20-1">5</span>
            <span class="slider-label-1 mark-0_16-1">6</span>
            <span class="slider-label-1 mark-0_14-1">7</span>
            <span class="slider-label-1 mark-0_12-1">8</span>
            <span class="slider-label-1 mark-0_11-1">9</span>
        </div>
    <label>Dekat dengan Layanan Publik</label>
</div>

<script>
    const slider18u2 = document.getElementById('slider18u2');
    const sliderValue18u2 = document.getElementById('sliderValue18u2');
    const sliderTooltip18u2 = document.getElementById('sliderTooltip18u2');

    function updateValue18u2(value) {
        const snappedValue = values[value - 1];
        sliderValue18u2.innerText = snappedValue;
        slider18u2.setAttribute('data-snapped-value', snappedValue);
        sliderTooltip18u2.innerText = snappedValue;
    }

    slider18.addEventListener('input', (event) => {
        const value = parseInt(event.target.value);
        updateValue18u2(value);
    });

    updateValue18u2(slider18u2.value);
</script>
