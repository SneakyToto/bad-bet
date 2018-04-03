import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.text.SimpleDateFormat;
import java.util.Date;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

@WebServlet("NAME_TBD")
public class confirm extends HttpServlet
{
   static String url = "http://localhost:8080/bad-bet-proj/login_page";

   String msg = "";

   public void doGet(HttpServletRequest request, HttpServletResponse response)
               throws ServletException, IOException
   {
      if (request.getParameter("password").length() > 0 && request.getParameter("username").length() > 0)
         doPost(request, response);
      else
      // if a user tries to access the servlet via a browser, url rewriting, curl,
	  // or bypass the contact us form (contact_us.php),
	  // redirect the user to contact_us.php
      response.sendRedirect("http://localhost/cs4640s18/php-servlet/contact_us.php");
   }

   public void doPost(HttpServletRequest request, HttpServletResponse response)
               throws ServletException, IOException
   {
      response.setContentType("text/html");
      PrintWriter out = response.getWriter();

      String username = request.getParameter("username");
      String password = request.getParameter("password");

      if (username.length() > 0 && password.length() > 0)
      {
         printConfirmation(username, out);

         HttpSession session = request.getSession();
         session.setAttribute("username", request.getParameter("username"));

         out.println("<br/><br/><p>Logged in as " + username + ".</p>");

      }
      else
      {
         out.println("You did not enter anything");
         // and probably redirect the user to contact form
      }

      out.close();
   }

   private void printConfirmation(String username, PrintWriter out){
     out.println("<!DOCTYPE html>");
     out.println("<html>");
     out.println("<head>");
     out.println("	<title>BAD BET OFFICIAL</title>");
     out.println("	<meta charset="utf-8">");
     out.println("	<link rel="stylesheet" type="text/css" href="band.css">");
     out.println("</head>");
     out.println("<body>");
     out.println("	<ul>");
     out.println("		<li><a href="music.php">music</a></li>");
     out.println("		<li><a href="vlog.html">on the street</a></li>");
     out.println("		<li class="active"><a href="gig.html">gigs</a></li>");
     out.println("    <li><a href="contact.php">Member Login</a></li>");
     out.println("  </ul>");
     out.println("  <h2> Welcome back, " + username + " !</h2>");
     out.println("  <p>Click here to purchase merchandise</p>");
     out.println("  <p>Click here to download reserved tickets</p>");
     out.println("</body>");
     out.println("</html>");
   }
}
