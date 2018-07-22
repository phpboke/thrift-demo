namespace php Services.Test
service Test
{
  string sayHello(1:string name),
  
  string getMd5(1:string username, 2:string password)
}
