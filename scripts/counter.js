const counters=document.querySelectorAll('.counter h2');
const speed=2;

counters.forEach(counter=>{
    const updateCount = () =>{
        const target = +counter.getAttribute('data-target');
        const count= +counter.innerText;
                              
        const inc= target/speed;
        if(count< target){
            counter.innerText=count + inc;
            setTimeout(updateCount,1);
        }else{
            count.innerText=target;
        }
    }
    updateCount();
});