let resources = [
    {
        name:'item',
        parent:'',
        discreption:'items resource',
        headers:['name','code','unit.name','selling_price','quantity','tax.name','created_at']
    },
    {
        name:'category',
        parent:'',
        headers:['name','created_at'],
        discreption:'categories resource'
    },
    {
        name:'unit',
        parent:'',
        headers:['name','created_at'],
        discreption:'categories resource'
    },
    {
        name:'tax',
        parent:'',
        headers:['name','percentage','created_at'],
        discreption:'categories resource'
    },
    {
        name:'user',
        parent:'',
        headers:['name','user_name','email','mobile','created_at'],
        discreption:'customers resource'
    },
    {
        name:'order',
        parent:'',
        headers:['id','user.name','total','discount','tax','taxed_total','status','created_at'],
        discreption:'orders resource'
    },
    {
        name:'item',
        parent:'order',
        headers:['order_id','item.name','quantity'],
        discreption:'purchases resource'
    },
    {
        name:'payment',
        parent:'order',
        module_name:'order_payment',
        headers:['order_id','amount','created_at'],
        discreption:'payments resource'
    },
    {
        name:'media',
        parent:'gallery',
        discreption:'gallery media resource'
    },
    {
        name:'reaction',
        parent:'item',
        discreption:'item reaction resource'
    },
    {
        name:'setting',
        parent:'',        
        discreption:'settings resource'
    },
    {
        name:'media',
        parent:'',        
        discreption:'mails resource'
    },
    {
        name:'media',
        parent:'item',        
        discreption:'mails resource'
    },
    {
        name:'rank',
        parent:'item',        
        discreption:'friends resource'
    },
    {
        name:'address',
        parent:'',        
        discreption:'address resource'
    },
    {
        name:'coupon',
        parent:'',  
        headers:['id','code','value'],      
        discreption:'address resource'
    },
    {
        name:'reaction',
        parent:'item',
    },
    {
        name:'rank',
        parent:'item',
    }
] 
export default resources;