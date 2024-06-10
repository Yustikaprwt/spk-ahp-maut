{{-- KRITERIA FASILITAS PENGGUNA 1 --}}

{{-- FASILITAS & HARGA USER 2 (C1-C2-U2) --}}
<div class="input-group-1">
    <label>Fasilitas Indekos</label>
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
                id="slider1u2" 
                name="C1-C2-U2"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue1u2(this.value)">
            <span class="value-label" id="sliderValue1u2">1</span>
            <div class="slider-tooltip-1" id="sliderTooltip1u2">1</div>

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
    <label>Harga Sewa Indekos</label>
</div>

<script>
    const slider1u2 = document.getElementById('slider1u2');
    const sliderValue1u2 = document.getElementById('sliderValue1u2');
    const sliderTooltip1u2 = document.getElementById('sliderTooltip1u2');
    const values = [9, 8, 7, 6, 5, 4, 3, 2, 1, 0.50, 0.33, 0.25, 0.20, 0.16, 0.14, 0.12, 0.11];

    function updateValue1u2(value) {
        const snappedValue = values[value - 1];
        sliderValue1u2.innerText = snappedValue;
        slider1u2.setAttribute('data-snapped-value', snappedValue);
        sliderTooltip1u2.innerText = snappedValue;
    }

    slider1.addEventListener('input', (event) => {
        const value = parseInt(event.target.value);
        updateValue1u2(value);
    });

    updateValue1u2(slider1u2.value);
</script>