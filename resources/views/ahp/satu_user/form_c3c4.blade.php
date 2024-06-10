{{-- LOKASI & LINGKUNGAN (C3-C4) --}}

<div class="input-group">
    <label>Lokasi Indekos</label>
        <div class="slider-container">
            <span class="slider-mark mark-9"></span>
            <span class="slider-mark mark-8"></span>
            <span class="slider-mark mark-7"></span>
            <span class="slider-mark mark-6"></span>
            <span class="slider-mark mark-5"></span>
            <span class="slider-mark mark-4"></span>
            <span class="slider-mark mark-3"></span>
            <span class="slider-mark mark-2"></span>
            <span class="slider-mark mark-1"></span>
            <span class="slider-mark mark-0_50"></span>
            <span class="slider-mark mark-0_33"></span>
            <span class="slider-mark mark-0_25"></span>
            <span class="slider-mark mark-0_20"></span>
            <span class="slider-mark mark-0_16"></span>
            <span class="slider-mark mark-0_14"></span>
            <span class="slider-mark mark-0_12"></span>
            <span class="slider-mark mark-0_11"></span>

            <input 
                type="range" 
                id="slider8" 
                name="C3-C4"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue8(this.value)">
            <span class="value-label" id="sliderValue8">1</span>
            <div class="slider-tooltip" id="sliderTooltip8">1</div>

            <span class="slider-label mark-9">9</span>
            <span class="slider-label mark-8">8</span>
            <span class="slider-label mark-7">7</span>
            <span class="slider-label mark-6">6</span>
            <span class="slider-label mark-5">5</span>
            <span class="slider-label mark-4">4</span>
            <span class="slider-label mark-3">3</span>
            <span class="slider-label mark-2">2</span>
            <span class="slider-label mark-1">1</span>
            <span class="slider-label mark-0_50">2</span>
            <span class="slider-label mark-0_33">3</span>
            <span class="slider-label mark-0_25">4</span>
            <span class="slider-label mark-0_20">5</span>
            <span class="slider-label mark-0_16">6</span>
            <span class="slider-label mark-0_14">7</span>
            <span class="slider-label mark-0_12">8</span>
            <span class="slider-label mark-0_11">9</span>
        </div>
    <label>Lingkungan & Keamanan Indekos</label>
</div>

<script>
const slider8 = document.getElementById('slider8');
const sliderValue8 = document.getElementById('sliderValue8');
const sliderTooltip8 = document.getElementById('sliderTooltip8');

function updateValue8(value) {
    const snappedValue = values[value - 1];
    sliderValue8.innerText = snappedValue;
    slider8.setAttribute('data-snapped-value', snappedValue);
    sliderTooltip8.innerText = snappedValue;
    console.log(`User input 7 : ${snappedValue}`);
}

slider8.addEventListener('input', (event) => {
    const value = parseInt(event.target.value);
    updateValue8(value);
});

updateValue8(slider8.value);
</script>


