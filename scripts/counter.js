const counters=document.querySelectorAll('.counter h2');
const speed=3;

counters.forEach(counter=>{
    const updateCount = () =>{
        const target = +Math.floor(counter.getAttribute('data-target'));
        const count= +counter.innerText;
                              
        const inc= target/speed;
        if(count< target){
            counter.innerText=Math.floor(count + inc);
            setTimeout(updateCount,1);
        }else{
            count.innerText=target;
        }
    }
    updateCount();
});