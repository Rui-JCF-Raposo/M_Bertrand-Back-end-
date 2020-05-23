console.log("Orders JS Connected!");

const cancel_order_btns = document.querySelectorAll(".cancel-order");
const see_details_btns = document.querySelectorAll(".see-details");

cancel_order_btns.forEach((btn) => {
    btn.addEventListener("click", (e) => {

        const order_id = e.target.parentElement.parentElement.dataset.order_id;
        
        fetch("orders", {
            method: "PUT",
            headers: {
                "Content-Type": "text/plain"
            },
            body: order_id
        })
        .then(res => res.json())
        .then(data => {
            if(data.message === "Update Successfully") {
                const order_tr = e.target.parentElement.parentElement;
                order_tr.remove();
            }
        }) 
        ;

    });
});
