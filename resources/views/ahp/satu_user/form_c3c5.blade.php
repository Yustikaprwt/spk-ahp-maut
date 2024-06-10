{{-- LOKASI & KONDISI KAMAR (C3-C5) --}}

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
                id="slider9" 
                name="C3-C5"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue9(this.value)">
            <span class="value-label" id="sliderValue9">1</span>
            <div class="slider-tooltip" id="sliderTooltip9">1</div>

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
    <label>Kondisi Kamar Indekos</label>
</div>

<script>
const slider9 = document.getElementById('slider9');
const sliderValue9 = document.getElementById('sliderValue9');
const sliderTooltip9 = document.getElementById('sliderTooltip9');

function updateValue9(value) {
    const snappedValue = values[value - 1];
    sliderValue9.innerText = snappedValue;
    slider9.setAttribute('data-snapped-value', snappedValue);
    sliderTooltip9.innerText = snappedValue;
    console.log(`User input 8 : ${snappedValue}`);
}

slider9.addEventListener('input', (event) => {
    const value = parseInt(event.target.value);
    updateValue9(value);
});

updateValue9(slider9.value);
</script>

