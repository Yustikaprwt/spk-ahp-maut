{{-- HARGA & LINGKUNGAN USER 1 (C2-C4-U2) --}}
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
                id="slider6u2" 
                name="C2-C4-U2"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue6u2(this.value)">
            <span class="value-label" id="sliderValue6u2">1</span>
            <div class="slider-tooltip-1" id="sliderTooltip6u2">1</div>

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
    <label>Lingkungan Indekos</label>
</div>

<script>
const slider6u2 = document.getElementById('slider6u2');
const sliderValue6u2 = document.getElementById('sliderValue6u2');
const sliderTooltip6u2 = document.getElementById('sliderTooltip6u2');

function updateValue6u2(value) {
    const snappedValue = values[value - 1];
    sliderValue6u2.innerText = snappedValue;
    slider6u2.setAttribute('data-snapped-value', snappedValue);
    sliderTooltip6u2.innerText = snappedValue;
}

slider6u2.addEventListener('input', (event) => {
    const value = parseInt(event.target.value);
    updateValue6u2(value);
});

updateValue6u2(slider6u2.value);
</script>