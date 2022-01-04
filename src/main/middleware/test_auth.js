export default function auth({ next, router }) {
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    console.log("auth middleware");
    if (!localStorage.getItem('user_data')) {
      return router.push({ name: 'login' });
    }
  
    return next();
  }