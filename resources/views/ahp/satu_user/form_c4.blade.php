{{-- LINGKUNGAN & KONDISI KAMAR INDEKOS (C4-C5) --}}

<div class="input-group">
    <label>Lingkungan & Keamanan Indekos</label>
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
                id="slider10" 
                name="C4-C5"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue10(this.value)">
            <span class="value-label" id="sliderValue10">1</span>

            <div class="slider-tooltip" id="sliderTooltip10">1</div>

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
const slider10 = document.getElementById('slider10');
const sliderValue10 = document.getElementById('sliderValue10');
const sliderTooltip10 = document.getElementById('sliderTooltip10');

function updateValue10(value) {
    const snappedValue = values[value - 1];
    sliderValue10.innerText = snappedValue;
    slider10.setAttribute('data-snapped-value', snappedValue);
    sliderTooltip10.innerText = snappedValue;
    console.log(`User input 9 : ${snappedValue}`);
}

slider10.addEventListener('input', (event) => {
    const value = parseInt(event.target.value);
    updateValue10(value);
});

updateValue10(slider10.value);
</script>