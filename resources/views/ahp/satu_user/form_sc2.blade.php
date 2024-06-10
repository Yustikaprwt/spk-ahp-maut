{{-- SUBKRITERIA HARGA --}}

{{-- HARGA SEWA & SISTEM PEMBAYARAN INDEKOS (C2A-C2B) --}}

<div class="input-group">
    <label>Harga Sewa</label>
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
                id="slider17" 
                name="C2A-C2B"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue17(this.value)">
            <span class="value-label" id="sliderValue17">1</span>
            <div class="slider-tooltip" id="sliderTooltip17">1</div>

            <span style="margin-top: 10px" class="slider-label mark-9">9</span>
            <span style="margin-top: 10px" class="slider-label mark-8">8</span>
            <span style="margin-top: 10px" class="slider-label mark-7">7</span>
            <span style="margin-top: 10px" class="slider-label mark-6">6</span>
            <span style="margin-top: 10px" class="slider-label mark-5">5</span>
            <span style="margin-top: 10px" class="slider-label mark-4">4</span>
            <span style="margin-top: 10px" class="slider-label mark-3">3</span>
            <span style="margin-top: 10px" class="slider-label mark-2">2</span>
            <span style="margin-top: 10px" class="slider-label mark-1">1</span>
            <span style="margin-top: 10px" class="slider-label mark-0_50">2</span>
            <span style="margin-top: 10px" class="slider-label mark-0_33">3</span>
            <span style="margin-top: 10px" class="slider-label mark-0_25">4</span>
            <span style="margin-top: 10px" class="slider-label mark-0_20">5</span>
            <span style="margin-top: 10px" class="slider-label mark-0_16">6</span>
            <span style="margin-top: 10px" class="slider-label mark-0_14">7</span>
            <span style="margin-top: 10px" class="slider-label mark-0_12">8</span>
            <span style="margin-top: 10px" class="slider-label mark-0_11">9</span>
        </div>
    <label>Sistem Pembayaran Indekos</label>
</div>

<script>
const slider17 = document.getElementById('slider17');
const sliderValue17 = document.getElementById('sliderValue17');
const sliderTooltip17 = document.getElementById('sliderTooltip17');

function updateValue17(value) {
    const snappedValue = values[value - 1];
    sliderValue17.innerText = snappedValue;
    slider17.setAttribute('data-snapped-value', snappedValue);
    sliderTooltip17.innerText = snappedValue;
    console.log(`User input 15 : ${snappedValue}`);
}

slider17.addEventListener('input', (event) => {
    const value = parseInt(event.target.value);
    updateValue17(value);
});

updateValue17(slider17.value);
</script>


