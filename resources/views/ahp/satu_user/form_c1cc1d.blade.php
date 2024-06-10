{{-- FASILITAS KAMAR & FASILITAS PENDUKUNG (C1C-C1D) --}}

<div class="input-group">
    <label>Fasilitas Kamar</label>
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
                id="slider16" 
                name="C1C-C1D"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue16(this.value)">
            <span class="value-label" id="sliderValue16">1</span>
            <div class="slider-tooltip" id="sliderTooltip16">1</div>

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
    <label>Fasilitas Pendukung</label>
</div>

<script>
const slider16 = document.getElementById('slider16');
const sliderValue16 = document.getElementById('sliderValue16');
const sliderTooltip16 = document.getElementById('sliderTooltip16');

function updateValue16(value) {
    const snappedValue = values[value - 1];
    sliderValue16.innerText = snappedValue;
    slider16.setAttribute('data-snapped-value', snappedValue);
    sliderTooltip16.innerText = snappedValue;
    console.log(`User input fasilitas : ${snappedValue}`);
}

slider16.addEventListener('input', (event) => {
    const value = parseInt(event.target.value);
    updateValue16(value);
});

updateValue16(slider16.value);
</script>

