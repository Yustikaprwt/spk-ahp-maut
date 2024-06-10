{{-- HARGA & LOKASI USER 1 (C2-C3-U1) --}}
<div class="input-group-1">
    <label>Harga Sewa Indekos</label>
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
                id="slider5u1" 
                name="C2-C3-U1"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue5u1(this.value)">
            <span class="value-label" id="sliderValue5u1">1</span>
            <div class="slider-tooltip-1" id="sliderTooltip5u1">1</div>

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
    <label>Lokasi Indekos</label>
</div>

<script>
const slider5u1 = document.getElementById('slider5u1');
const sliderValue5u1 = document.getElementById('sliderValue5u1');
const sliderTooltip5u1 = document.getElementById('sliderTooltip5u1');

function updateValue5u1(value) {
    const snappedValue = values[value - 1];
    sliderValue5u1.innerText = snappedValue;
    slider5u1.setAttribute('data-snapped-value', snappedValue);
    sliderTooltip5u1.innerText = snappedValue;
}

slider5u1.addEventListener('input', (event) => {
    const value = parseInt(event.target.value);
    updateValue5u1(value);
});

updateValue5u1(slider5u1.value);
</script>
