Imports System
Imports System.ComponentModel
Imports System.Threading
Imports System.IO.Ports
Imports System.Net
Imports System.IO


Public Class Form1
    Dim myPort As Array  'COM Ports detected on the system will be stored here
    Delegate Sub SetTextCallback(ByVal [text] As String) 'Added to prevent threading errors during receiveing of data

    Private Sub Form1_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        myPort = IO.Ports.SerialPort.GetPortNames() 'Get all com ports available
        Control.CheckForIllegalCrossThreadCalls = False
        cmbBaud.Items.Add(9600)     'Populate the cmbBaud Combo box to common baud rates used
        cmbBaud.Items.Add(19200)
        cmbBaud.Items.Add(38400)
        cmbBaud.Items.Add(57600)
        cmbBaud.Items.Add(115200)

        For i = 0 To UBound(myPort)
            cmbPort.Items.Add(myPort(i))
        Next
        cmbPort.Text = cmbPort.Items.Item(0)    'Set cmbPort text to the first COM port detected
        cmbBaud.Text = cmbBaud.Items.Item(0)    'Set cmbBaud text to the first Baud rate on the list

        btnDisconnect.Enabled = False           'Initially Disconnect Button is Disabled

    End Sub

    
   

    Private Sub btnConnect_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnConnect.Click

        SerialPort1.PortName = cmbPort.Text         'Set SerialPort1 to the selected COM port at startup
        SerialPort1.BaudRate = cmbBaud.Text         'Set Baud rate to the selected value on

        'Other Serial Port Property
        SerialPort1.Parity = IO.Ports.Parity.None
        SerialPort1.StopBits = IO.Ports.StopBits.One
        SerialPort1.DataBits = 8            'Open our serial port
        SerialPort1.Open()

        btnConnect.Enabled = False          'Disable Connect button
        btnDisconnect.Enabled = True        'and Enable Disconnect button
    End Sub

    Private Sub btnDisconnect_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnDisconnect.Click
        SerialPort1.Close()             'Close our Serial Port

        btnConnect.Enabled = True
        btnDisconnect.Enabled = False
    End Sub

    Private Sub SerialPort1_DataReceived(ByVal sender As Object, ByVal e As System.IO.Ports.SerialDataReceivedEventArgs) Handles SerialPort1.DataReceived

        Dim s As String = SerialPort1.ReadLine
        updateTB(s, Nothing)
    End Sub

    Delegate Sub tbUPD(ByVal s As String, ByVal tb As TextBox)
    'call this sub with the string you want in the 
    'specified textbox text property
    Private Sub updateTB(ByVal s As String, ByVal tb As TextBox)
        If tb Is Nothing Then


            Dim parts() As String = s.Split(New Char() {" "c})
            If parts.Length >= 3 Then

                node.Text = parts(0)
                bpm.Text = parts(1)


                If parts(2) = 0 Then
                    labelwarning.Text = "WARNING AT TAG " + parts(0)
                Else
                    labelwarning.Text = "TAG " + parts(0) + " OK "
                End If


                Dim strUrl As String = haddress.Text + "api.php?tags=" + parts(0) + "&bpm=" + parts(1)
                Dim request As WebRequest = HttpWebRequest.Create(strUrl)
                Dim response As HttpWebResponse = DirectCast(request.GetResponse, HttpWebResponse)
                Dim s1 As Stream = DirectCast(response.GetResponseStream(), Stream)
                Dim readStream As New StreamReader(s1)
                Dim dataString As String = readStream.ReadToEnd()
                patient.Text = dataString.ToString
                Dim saveNow As DateTime = DateTime.Now
                Time.Text = saveNow
                response.Close()
                s1.Close()
                readStream.Close()


            End If
        ElseIf tb.InvokeRequired Then
            Dim del As New tbUPD(AddressOf updateTB)
            tb.Invoke(del, s, tb)
        Else
            tb.Text = s
            Me.Refresh()
        End If
    End Sub

    Private Sub cmbPort_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmbPort.SelectedIndexChanged
        If SerialPort1.IsOpen = False Then
            SerialPort1.PortName = cmbPort.Text         'pop a message box to user if he is changing ports
        Else                                                                               'without disconnecting first.
            MsgBox("Valid only if port is Closed", vbCritical)
        End If
    End Sub

    Private Sub cmbBaud_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmbBaud.SelectedIndexChanged
        If SerialPort1.IsOpen = False Then
            SerialPort1.BaudRate = cmbBaud.Text         'pop a message box to user if he is changing baud rate
        Else                                                                                'without disconnecting first.
            MsgBox("Valid only if port is Closed", vbCritical)
        End If
    End Sub

 
  
  
 
 
End Class

