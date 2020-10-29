/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Logica;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author javier
 */
public class Controlador extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            
     
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<link rel=\"stylesheet\" type=\"text/css\" href=\"estilo.css\" />");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Calculo</title>");            
            out.println("</head>");
            out.println("<body>");
            
            String num1=request.getParameter("num1");
            
            String num2=request.getParameter("num2");
            
            String btnSuma=request.getParameter("btnsuma");
            String btnResta=request.getParameter("btnresta");
          
            
             if(btnSuma!=null){
                 int resul=Integer.parseInt(num1) + Integer.parseInt(num2);
                 out.println("El resultado de la suma es:" + resul);
                 
             }
            if(btnResta!=null){
                 int resul=Integer.parseInt(num1) - Integer.parseInt(num2);
                 out.println("El resultado de la resta es:" + resul);
                 
             }
          
            
            
            out.println("<div class=\"centrarbotonvolver\">");   
	 	
	    out.println("<input type=\"button\" name=\"volver\" value=\"Volver al Menú\" class=\"boton\" onclick=\"location.href='index.jsp'\">");
	    out.println("</div>");
            out.println("</body>");
            out.println("</html>");
        
    
         
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
